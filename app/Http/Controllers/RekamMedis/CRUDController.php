<?php

namespace App\Http\Controllers\RekamMedis;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\HasilPemeriksaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CRUDController extends Controller
{
    public function getIndex()
    {
        $page_title = 'Rekam Medis';


        if(auth()->user()->role == 'Pasien') {
            $page_description = 'Riwayat Rekam medis anda  yang telah tersimpan ke sistem';
            $data = HasilPemeriksaan::with(['berobat', 'pasien'])->where('no_rm', auth()->user()->no_rm)->get();
            return view('rekam-medis.pasien', compact('page_title', 'page_description', 'data'));
        } else {
            $page_description = 'Seluruh rekam medis pasien yang telah tersimpan ke sistem';
            return view('rekam-medis.index', compact('page_title', 'page_description'));
        }
    }

    public function getDataTable(Request $request)
    {
        $table = HasilPemeriksaan::with(['pasien', 'berobat']);

        return DataTables::eloquent($table)
        ->addColumn('action', function($item) {
            $txt = '<a href="'. url("rekam-medis/detail/". $item->id) .'" class="btn btn-success mx-1">Detail</a>';
            $txt .= '<button type="button" onclick=remove(\''. $item->id .'\') class="btn btn-danger mx-1">Remove</button>';
            return $txt;
        })
        ->editColumn('pasien.tanggal_lahir', function ($item)
        {
            return Carbon::parse($item->pasien->tanggal_lahir)->age . ' Tahun';
        })
        ->editColumn('berobat.tanggal', function ($item)
        {
            return Carbon::parse($item->berobat->tanggal)->format('d F Y');
        })
        ->addIndexColumn()
        ->escapeColumns()
        ->toJson();
    }

    public function deleteIndex($id)
    {
        $data = HasilPemeriksaan::find($id);
        if($data->delete()) {
            Helper::saveLog('Menghapus Pemeriksaan/Rekam Medis id : ' . $id, 'event', auth()->id());
            return Helper::RestResponse(true, 200, 'Berhasil menghapus data!', $data);
        } else {
            return Helper::RestResponse(false, 400, 'Gagal menghapus data!');
        }
    }

    public function getDetail($id)
    {
        $page_title = 'Detail Rekam Medis';
        $page_description = 'Informasi Rekam Medis Pasien secara Detail';
        $data = HasilPemeriksaan::with(['berobat', 'pasien'])->find($id);

        return view('rekam-medis.detail', compact('page_title', 'page_description', 'data'));
    }

    public function postIndex(CreateRequest $request, ObatService $service)
    {
        $insert = $service->create($request->all());
        if($insert) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil menambahkan data obat!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal menambahkan data obat!';
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
}
