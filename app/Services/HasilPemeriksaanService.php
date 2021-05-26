<?php

namespace App\Services;

use app\Helpers\Helper;
use App\Models\HasilPemeriksaan;
use App\Models\Obat;
use App\Models\TypeSoal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class HasilPemeriksaanService {
    public function create($data)
    {
        DB::beginTransaction();
        $insert = HasilPemeriksaan::create($data);
        if($insert) {
            DB::commit();
            Helper::saveLog('Menyimpan Hasil Pemeriksaan RM : ' . $insert->no_rm, 'event', auth()->id());
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
        return true;
    }
}
