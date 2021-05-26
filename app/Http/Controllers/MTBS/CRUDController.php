<?php

namespace App\Http\Controllers\MTBS;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MTBS\CreateRequest;
use App\Http\Requests\MTBS\UpdateRequest;
use App\Models\MTBS;
use App\Models\Obat;
use App\Models\User;
use App\Services\MTBSService;
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
        $page_title = 'Daftar MTBS';
        $page_description = 'Seluruh mtbs pasien yang disimpan ke sistem';

        return view('mtbs.index', compact('page_title', 'page_description'));
    }

    public function getDataTable(Request $request)
    {
        $table = MTBS::query();

        return DataTables::eloquent($table)
        ->addColumn('action', function($item) {
            $txt = '<a href="'. url("mtbs/edit/". $item->id) .'" class="btn btn-success mx-1">Edit</a>';
            $txt .= '<button type="button" onclick=remove(\''. $item->id .'\') class="btn btn-danger mx-1">Remove</button>';
            return $txt;
        })
        ->editColumn('tanggal' , function ($item)
        {
            return Carbon::parse($item->tanggal)->format('d F Y');
        })
        ->editColumn('no_rm', function ($item)
        {
            return '#'. $item->no_rm;
        })
        ->addIndexColumn()
        ->escapeColumns()
        ->toJson();
    }

    public function deleteIndex($id)
    {
        $data = MTBS::find($id);
        if($data->delete()) {
            Helper::saveLog('Menghapus MTBS id : ' . $id, 'event', auth()->id());
            return Helper::RestResponse(true, 200, 'Berhasil menghapus data!', $data);
        } else {
            return Helper::RestResponse(false, 400, 'Gagal menghapus data!');
        }
    }

    public function postIndex(CreateRequest $request, MTBSService $service)
    {
        $insert = $service->create($request->all());
        if($insert) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil menambahkan MTBS!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal menambahkan MTBS!';
            return Redirect::back()->withInput();
        }
    }

    public function getEdit($id)
    {
        $data = MTBS::with('pasien')->find($id);
        $page_title = 'Edit MTBS : ' . $data->nama_anak;
        $page_description = 'Gunakan halaman ini untuk mengubah informasi MTBS Anak';

        return view('mtbs.edit', compact('data', 'page_title', 'page_description'));
    }

    public function putIndex($id, UpdateRequest $request, MTBSService $service)
    {
        $update = $service->update($id, $request->except(['_token', '_method', 'no_rm', 'nama_anak']));
        if($update) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil update data mtbs!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal update data mtbs!';
            Session::flash('message', $msg);
            return Redirect::back()->withInput();
        }
    }

    public function getCreate()
    {
        $page_title = 'Tambah MTBS';
        $page_description = 'Gunakan halaman ini untuk menambahkan mtbs pasien ibu dan anak';
        // dd($data);
        $users = User::where('role', 'Pasien')->get();
        return view('mtbs.create', compact('page_title', 'page_description', 'users'));
    }

    public function pendaftaran()
    {
        $page_title = 'Pendaftaran Pasien';
        $page_description = 'Halaman ini digunakan untuk mendaftarkan pasien ke dalam sistem';
        return view('pasien.pendaftaran', compact('page_title', 'page_description'));
    }
}
