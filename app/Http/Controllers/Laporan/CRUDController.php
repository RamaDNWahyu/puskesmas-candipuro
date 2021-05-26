<?php

namespace App\Http\Controllers\Laporan;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Obat\CreateRequest;
use App\Http\Requests\Obat\UpdateRequest;
use App\Models\Berobat;
use App\Models\Obat;
use App\Services\ObatService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CRUDController extends Controller
{
    public function getPelayanan()
    {
        $table = array();
        if(request()->has('tanggal_awal') && request()->has('tanggal_akhir')) {
            $table = $this->laporanPelayanan(request()->get('tanggal_awal'), request()->get('tanggal_akhir'));
        }
        $page_title = 'Laporan Pelayanan';
        $page_description = 'Halaman ini digunakan untuk melakukan cetak laporan pelayanan';
        return view("laporan.pelayanan", compact('page_title', 'page_description', 'table'));
    }

    public function getPelayananPrint()
    {
        if(!request()->has('tanggal_awal') && request()->has('tanggal_akhir')) {
            return redirect('laporan/pelayanan');
        }

        $table = $this->laporanPelayanan(request()->get('tanggal_awal'), request()->get('tanggal_akhir'));
        return view('print.pelayanan', compact('table'));
    }

    function laporanPelayanan($tanggal_awal, $tanggal_akhir)
    {
        return Berobat::select(DB::raw('
            DATE(tanggal) as tanggal_berobat,
            SUM(rujukan = "1" AND kepesertaan = "NON PBI" AND kepesertaan = "UMUM") as non_rujukan_count,
            SUM(rujukan = "1" AND kepesertaan = "PBI") as rujukan_count,
            SUM(kepesertaan = "PBI") as pbi_count,
            SUM(kepesertaan = "NON PBI") as non_pbi_count,
            SUM(kepesertaan = "UMUM") as umum_count'))->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->groupBy('tanggal_berobat')->get();
    }
}
