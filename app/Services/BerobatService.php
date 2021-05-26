<?php

namespace App\Services;

use app\Helpers\Helper;
use App\Models\Berobat;
use App\Models\Obat;
use App\Models\TypeSoal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BerobatService {
    public function create($data)
    {
        $user = auth()->user();
        if($user->role == 'Pasien') {
            $rm = $user->no_rm;
            $kepesertaan = $user->kepesertaan;
        } else {
            $rm = $data['no_rm'];
            $kepesertaan = $data['kepesertaan'];
        }
        $check = Berobat::where('no_rm', $rm)->whereDate('tanggal', Carbon::now())->where('status', 'Menunggu')->exists();
        if($check) {
            return 'Sudah ada';
        }
        $no_urut = Berobat::whereDate('tanggal', Carbon::now())->count();
        DB::beginTransaction();
        $insert = Berobat::create([
            'no_rm' => $rm,
            'no_urut' => $no_urut + 1,
            'jenis_kunjungan' => $data['tipe_kunjungan'],
            'kepesertaan' => $kepesertaan,
            'rujukan' => $data['rujukan'],
            'tanggal' => Carbon::now(),
        ]);
        if($insert) {
            DB::commit();
            Helper::saveLog('Menyimpan berobat NO RM : ' . $rm, 'event', auth()->id());
            return $insert;
        } else {
            DB::rollback();
            return false;
        }
    }

    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            Obat::where('id', $id)
            ->update($data);
        } catch (QueryException $th) {
            DB::rollback();
            return false;
        }
        DB::commit();
        Helper::saveLog('Update berobat id : ' . $id, 'event', auth()->id());
        return true;
    }
}
