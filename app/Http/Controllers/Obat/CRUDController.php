<?php

namespace App\Http\Controllers\Obat;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Obat\CreateRequest;
use App\Http\Requests\Obat\UpdateRequest;
use App\Models\Obat;
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
        $page_title = 'Daftar Obat';
        $page_description = 'Seluruh obat yang telah terdaftar ke sistem';

        return view('obat.index', compact('page_title', 'page_description'));
    }

    public function getDataTable(Request $request)
    {
        $table = Obat::query();

        return DataTables::eloquent($table)
        ->addColumn('action', function($item) {
            $txt = '<a href="'. url("obat/edit/". $item->id) .'" class="btn btn-success mx-1">Edit</a>';
            $txt .= '<button type="button" onclick=remove(\''. $item->id .'\') class="btn btn-danger mx-1">Remove</button>';
            return $txt;
        })
        ->addIndexColumn()
        ->escapeColumns()
        ->toJson();
    }

    public function deleteIndex($id)
    {
        $data = Obat::find($id);
        if($data->delete()) {
            Helper::saveLog('Menghapus Obat id : ' . $id, 'event', auth()->id());
            return Helper::RestResponse(true, 200, 'Berhasil menghapus data!', $data);
        } else {
            return Helper::RestResponse(false, 400, 'Gagal menghapus data!');
        }
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

    public function getCreate()
    {
        $page_title = 'Tambah Obat';
        $page_description = 'Gunakan halaman ini untuk menambahkan informasi sebuah obat';
        // dd($data);
        return view('obat.create', compact('page_title', 'page_description'));
    }

    public function pendaftaran()
    {
        $page_title = 'Pendaftaran Pasien';
        $page_description = 'Halaman ini digunakan untuk mendaftarkan pasien ke dalam sistem';
        return view('pasien.pendaftaran', compact('page_title', 'page_description'));
    }
}
