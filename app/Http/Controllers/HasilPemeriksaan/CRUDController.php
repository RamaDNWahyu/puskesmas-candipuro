<?php

namespace App\Http\Controllers\HasilPemeriksaan;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\HasilPemeriksaan\CreateRequest as HasilPemeriksaanCreateRequest;
use App\Http\Requests\Obat\CreateRequest;
use App\Http\Requests\Obat\UpdateRequest;
use App\Models\Berobat;
use App\Models\Obat;
use App\Services\HasilPemeriksaanService;
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
        $page_title = 'Tambah Hasil Pemeriksaan';
        $page_description = 'Digunakan untuk menambahkan hasil pemeriksaan terhadap pasien';

        $data = Berobat::select('*', 'berobat.id as id_berobat')->join('users', 'berobat.no_rm', '=', 'users.no_rm')->whereDate('berobat.tanggal', today())->where('berobat.status', 'Menunggu')->get();

        return view('hasil-pemeriksaan.index', compact('page_title', 'page_description', 'data'));
    }
    public function postIndex(HasilPemeriksaanCreateRequest $request, HasilPemeriksaanService $service)
    {
        $insert = $service->create($request->all());
        if($insert) {
            $msg['color'] = 'primary';
            $msg['success'] = true;
            $msg['message'] = 'Berhasil menambahkan data pemeriksaan!';
            Session::flash('message', $msg);
            return Redirect::back();
        } else {
            $msg['color'] = 'danger';
            $msg['success'] = false;
            $msg['message'] = 'Gagal menambahkan data pemeriksaan!';
            Session::flash('message', $msg);
            return Redirect::back()->withInput();
        }
    }
}
