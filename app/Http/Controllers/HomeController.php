<?php

namespace App\Http\Controllers;

use App\Models\Berobat;
use App\Models\Obat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = '| Tanggal : ' . Carbon::now()->format('d F Y H:i:s');
        $obat_count = Obat::count();
        $pasien_count = User::where('role', 'Pasien')->count();
        $pengobatan_count = Berobat::where('status', 'Selesai')->count();
        $pasien_menunggu_hari_ini = Berobat::whereDate('tanggal', now())->where('status', 'Menunggu')->count();
        $pasien_selesai_hari_ini = Berobat::whereDate('tanggal', now())->where('status', 'Selesai')->count();
        $pasien_sekarang_hari_ini = Berobat::whereDate('tanggal', now())->where('status', 'Menunggu')->latest()->first();
        $pasien_total_hari_ini = Berobat::whereDate('tanggal', now())->count();
        $pasien_selanjutnya_hari_ini = Berobat::whereDate('tanggal', now())->where('status', 'Menunggu')->latest()->offset(1)->first();

        return view('dashboard', compact(
            'page_title',
            'page_description',
            'obat_count',
            'pasien_count',
            'pengobatan_count',
            'pasien_menunggu_hari_ini',
            'pasien_selesai_hari_ini',
            'pasien_sekarang_hari_ini',
            'pasien_total_hari_ini',
            'pasien_selanjutnya_hari_ini',
        ));
    }
}
