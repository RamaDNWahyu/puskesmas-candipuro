<?php

namespace App\Http\Controllers\Berobat;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Obat\CreateRequest;
use App\Http\Requests\Obat\UpdateRequest;
use App\Models\Berobat;
use App\Models\Obat;
use App\Models\User;
use App\Services\BerobatService;
use App\Services\ObatService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CRUDController extends Controller
{
    public function getIndex()
    {
        $page_title = 'Pendaftaran Berobat';
        $page_description = 'Fitur ini digunakan untuk melakukan pendaftaran berobat';
        $data = User::with('berobat')->find(auth()->id());
        $pendaftaran_anda = Berobat::where('status', 'Menunggu')->whereDate('tanggal', today())->where('no_rm', auth()->user()->no_rm)->first();
        $yang_berobat = Berobat::with('pasien')->where('status', 'Menunggu')->whereDate('tanggal', today())->orderBy('created_at', 'asc')->limit(5)->get();
        if(request()->ajax()) {
            return view('berobat._row_pendaftar', compact('yang_berobat', 'data'));
        }
        return view('berobat.index', compact('page_title', 'page_description', 'data', 'yang_berobat', 'pendaftaran_anda'));
    }

    public function getDataTable(Request $request)
    {

        if($request->has('tanggal') && $request->get('tanggal') != '') {
            $tanggal = $request->get('tanggal');
        } else {
            $tanggal = today();
        }

        $query = Berobat::with('pasien', 'hasil_pemeriksaan')->whereDate('tanggal', $tanggal);


        if($request->has('status') && $request->get('status') != '') {
            $status = $request->get('status');
            $query = $query->where('status', $status);
        } elseif($request->get('status') == '') {
        } else {
            $status = 'Menunggu';
            $query = $query->where('status', $status);
        }

        if($request->has('rujukan') && $request->get('rujukan') != '') {
            $query = $query->where('rujukan', $request->get('rujukan'));
        }
        if($request->has('kepesertaan') && $request->get('kepesertaan') != '') {
            $query = $query->where('kepesertaan', $request->get('kepesertaan'));
        }


        return DataTables::eloquent($query)
        ->addColumn('action', function($item) {
            $txt = '';
            if($item->status == 'Menunggu') {
                $txt .= '<button type="button" onclick=selesai(\''. $item->id .'\') class="btn btn-success mx-1">Selesai</button>';
            }
            $txt .= '<button type="button" onclick=remove(\''. $item->id .'\') class="btn btn-danger mx-1">Remove</button>';
            return $txt;
        })
        ->editColumn('rujukan', function ($item)
        {
            return $item->rujukan ? 'Rujukan ' . $item->kepesertaan : 'Non Rujukan ' . $item->rujukan;
        })
        ->editColumn('pasien.tanggal_lahir', function ($item)
        {
            return Carbon::parse($item->pasien->tanggal_lahir)->age . ' Tahun';
        })
        ->editColumn('tanggal', function ($item)
        {
            return Carbon::parse($item->tanggal)->format('d F Y');
        })
        ->editColumn('hasil_pemeriksaan.kunjungan', function ($item)
        {
            return $item->hasil_pemeriksaan->kunjungan ?? 'Belum diperiksa';
        })
        ->editColumn('hasil_pemeriksaan.kasus', function ($item)
        {
            return $item->hasil_pemeriksaan->kasus ?? 'Belum diperiksa';
        })
        ->editColumn('hasil_pemeriksaan.diagnosa', function ($item)
        {
            return $item->hasil_pemeriksaan->diagnosa ?? 'Belum diperiksa';
        })
        ->editColumn('hasil_pemeriksaan.terapi', function ($item)
        {
            return $item->hasil_pemeriksaan->terapi ?? 'Belum diperiksa';
        })
        ->addIndexColumn()
        ->escapeColumns()
        ->toJson();
    }

    public function deleteIndex($id)
    {
        $data = Berobat::find($id);
        if($data->delete()) {
            Helper::saveLog('Menghapus Berobat id : ' . $id, 'event', auth()->id());
            return Helper::RestResponse(true, 200, 'Berhasil menghapus data!', $data);
        } else {
            return Helper::RestResponse(false, 400, 'Gagal menghapus data!');
        }
    }

    public function postIndex(Request $request, BerobatService $service)
    {
        if(!$request->has('rujukan')) {
            $msg['color'] = 'warning';
            $msg['success'] = false;
            $msg['message'] = 'Maaf, rujukan belum dipilih!';
            Session::flash('message', $msg);
            return Redirect::back();
        }

        $insert = $service->create($request->all());
        if($insert == 'Sudah ada') {
            $msg['color'] = 'warning';
            $msg['success'] = false;
            $msg['message'] = 'Maaf, Anda sudah terdaftar!';
            Session::flash('message', $msg);
            return Redirect::back();
        } elseif ($insert) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil mendaftarkan anda berobat!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal mendaftarkan anda!';
            Session::flash('message', $msg);
            return Redirect::back()->withInput();
        }
    }

    public function getEdit($id)
    {
        $data = Obat::find($id);
        $page_title = 'Edit Obat : ' . $data->name;
        $page_description = 'Gunakan halaman ini untuk mengubah informasi obat';

        return view('obat.edit', compact('data', 'page_title', 'page_description'));
    }

    public function putIndex($id, UpdateRequest $request, ObatService $service)
    {
        $update = $service->update($id, $request->except(['_token', '_method']));
        if($update) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil update data obat!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal update data obat!';
            Session::flash('message', $msg);
            return Redirect::back()->withInput();
        }
    }

    public function getCreate()
    {
        $page_title = 'Tambah Pendaftaran Berobat pasien';
        $page_description = 'Gunakan halaman ini untuk menambahkan pasien berobat';
        $pasien = User::where('role', 'Pasien')->get();
        // dd($data);
        return view('berobat.create', compact('page_title', 'page_description', 'pasien'));
    }

    public function getPendaftaran()
    {
        $page_title = 'Pendaftaran Berobat Pasien';
        $page_description = 'Halaman ini digunakan untuk mendaftarkan pasien berobat';
        return view('berobat.pendaftaran', compact('page_title', 'page_description'));
    }
    public function daftarKunjungan()
    {
        $page_title = 'Kunjungan Pasien KIA';
        $page_description = 'List pasien kunjungan berobat KIA';
        return view('berobat.kunjungan-kia', compact('page_title', 'page_description'));
    }

    public function deleteBatalkan()
    {
        $data = Berobat::where('no_rm', auth()->user()->no_rm)->whereDate('tanggal', today());
        if($data->delete()) {
            return Helper::RestResponse(true, 200, 'Berhasil membatalkan pendaftaran!', $data);
        } else {
            return Helper::RestResponse(false, 400, 'Gagal menghapus data!');
        }
    }

    public function postSelesai($id)
    {
        $data = Berobat::find($id);
        $data->status = 'Selesai';
        if($data->save()) {
            return Helper::RestResponse(true, 200, 'Berhasil menyelsaikan!', $data);
        } else {
            return Helper::RestResponse(false, 400, 'Gagal menyelsaikan data!');
        }
    }

    /* public function getKunjunganDatatable(Request $request)
    {
        if($request->has('tanggal') && $request->get('tanggal') != '') {
            $tanggal = $request->get('tanggal');
        } else {
            $tanggal = today();
        }

        $query = Berobat::with('pasien')->whereDate('tanggal', $tanggal);


        if($request->has('status') && $request->get('status') != '') {
            $status = $request->get('status');
            $query = $query->where('status', $status);
        } elseif($request->get('status') == '') {
        } else {
            $status = 'Menunggu';
            $query = $query->where('status', $status);
        }

        if($request->has('rujukan') && $request->get('rujukan') != '') {
            $query = $query->where('rujukan', $request->get('rujukan'));
        }
        if($request->has('kepesertaan') && $request->get('kepesertaan') != '') {
            $query = $query->where('kepesertaan', $request->get('kepesertaan'));
        }


        return DataTables::eloquent($query)
        ->addColumn('action', function($item) {
            $txt = '';
            if($item->status == 'Menunggu') {
                $txt .= '<button type="button" onclick=selesai(\''. $item->id .'\') class="btn btn-success mx-1">Selesai</button>';
            }
            $txt .= '<button type="button" onclick=remove(\''. $item->id .'\') class="btn btn-danger mx-1">Remove</button>';
            return $txt;
        })
        ->editColumn('rujukan', function ($item)
        {
            return $item->rujukan ? 'Rujukan ' . $item->kepesertaan : 'Non Rujukan ' . $item->rujukan;
        })
        ->editColumn('pasien.tanggal_lahir', function ($item)
        {
            return Carbon::parse($item->pasien->tanggal_lahir)->age . ' Tahun';
        })
        ->editColumn('tanggal', function ($item)
        {
            return Carbon::parse($item->tanggal)->format('d F Y');
        })
        ->addIndexColumn()
        ->escapeColumns()
        ->toJson();
    } */
}
