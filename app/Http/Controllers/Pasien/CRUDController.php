<?php

namespace App\Http\Controllers\Pasien;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pasien\CreateRequest;
use App\Http\Requests\Pasien\UpdateRequest;
use App\Models\TypeSoal;
use App\Models\User;
use App\Services\PasienService;
use App\Services\TipeSoalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CRUDController extends Controller
{
    public function getIndex()
    {
        $page_title = 'Daftar Pasien';
        $page_description = 'Seluruh pasien yang telah terdaftar ke sistem';

        return view('pasien.index', compact('page_title', 'page_description'));
    }

    public function getDataTable(Request $request)
    {
        $table = User::where('role', 'Pasien');

        return DataTables::eloquent($table)
        ->editColumn('tanggal_lahir', function ($item)
        {
            return Carbon::parse($item->tanggal_lahir)->age .' Tahun';
        })
        ->editColumn('gender', function ($item)
        {
            $color = $item->gender == "Lelaki" ? "primary" : "danger";
            $txt = '<span class="label label-lg font-weight-bold label-light-'. $color .' label-inline">'. $item->gender .'</span>';
            return $txt;
        })
        ->addColumn('action', function($item) {
            $txt = '<a href="'. url("pasien/edit/". $item->id) .'" class="btn btn-success mx-1">Edit</a>';
            $txt .= '<a target="_blank" href="'. url("pasien/kartu/". $item->id) .'" class="btn btn-primary mx-1">Cetak Kartu</a>';
            $txt .= '<button type="button" onclick=remove(\''. $item->id .'\') class="btn btn-danger mx-1">Remove</button>';
            return $txt;
        })
        ->addIndexColumn()
        ->escapeColumns(['ktp', 'name', 'nama_kk', 'tanggal_lahir'])
        ->toJson();
    }

    public function deleteIndex($id)
    {
        $data = User::find($id);
        if($data->delete()) {
            Helper::saveLog('Menghapus Pasien id : ' . $id, 'event', auth()->id());
            return Helper::RestResponse(true, 200, 'Berhasil menghapus data!', $data);
        } else {
            return Helper::RestResponse(false, 400, 'Gagal menghapus data!');
        }
    }

    public function postIndex(CreateRequest $request, PasienService $service)
    {
        $insert = $service->create($request->all());
        if($insert) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil menambahkan data pasien!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal menambahkan data pasien!';
            Session::flash('message', $msg);
            return Redirect::back()->withInput();
        }
    }

    public function getEdit($id)
    {
        $data = User::find($id);
        $page_title = 'Edit Pasien : ' . $data->name;
        $page_description = 'Gunakan halaman ini untuk mengubah informasi pasien';
        // dd($data);
        return view('pasien.edit', compact('data', 'page_title', 'page_description'));
    }

    public function putIndex($id, UpdateRequest $request, PasienService $service)
    {
        $update = $service->update($id, $request->except(['email', 'username', '_token', '_method', 'password_confirmation']));
        if($update) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil update data pasien!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal update data pasien!';
            Session::flash('message', $msg);
            return Redirect::back()->withInput();
        }
    }

    public function getCreate()
    {
        $page_title = 'Pendaftaran Pasien';
        $page_description = 'Halaman ini digunakan untuk mendaftarkan pasien ke dalam sistem';
        return view('pasien.pendaftaran', compact('page_title', 'page_description'));
    }

    public function getKartu($id)
    {
        $data = User::find($id);
        return view('member-card', compact('data'));
    }
}
