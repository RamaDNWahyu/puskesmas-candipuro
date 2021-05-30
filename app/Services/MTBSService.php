<?php

namespace App\Services;

use app\Helpers\Helper;
use App\Models\MTBS;
use App\Models\Obat;
use App\Models\TypeSoal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class MTBSService {
    public function create($data)
    {
        DB::beginTransaction();
        $data['tanda_bahaya'] = implode(',', $data['tanda_bahaya']);
        $insert = MTBS::create($data);
        if($insert) {
            DB::commit();
            Helper::saveLog('Menyimpan MTBS NO RM : ' . $insert->no_rm, 'event', auth()->id());
            return $insert;
        } else {
            DB::rollback();
            return false;
        }
    }

    public function update($id, $data)
    {
        DB::beginTransaction();
        $data['tanda_bahaya'] = implode(',', $data['tanda_bahaya']);
        try {
            MTBS::where('id', $id)
            ->update($data);
        } catch (QueryException $th) {
            DB::rollback();
            // throw($th);
            return false;
        }
        Helper::saveLog('Update MTBS id : ' . $id, 'event', auth()->id());
        DB::commit();
        return true;
    }
}
