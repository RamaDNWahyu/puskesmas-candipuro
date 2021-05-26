<?php

namespace App\Services;

use app\Helpers\Helper;
use App\Models\TypeSoal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasienService {
    public function create($data)
    {
        $today = Carbon::now()->format('dmy');
        $user = User::whereDate('created_at', Carbon::now())->count();
        if ($user) {
            $no = $user + 1;
            $no = sprintf("%04d", $no);
        } else {
            $no = 1;
            $no = sprintf("%04d", $no);
        }
        DB::beginTransaction();
        $data['no_rm'] = $today . $no;

        $insert = User::create($data);
        if($insert) {
            DB::commit();
            Helper::saveLog('Menyimpan Pasien NO RM : ' . $insert->no_rm, 'event', auth()->id());
            return $insert;
        } else {
            DB::rollback();
            return false;
        }
    }

    public function update($id, $data)
    {
        $user = User::find($id);
        DB::beginTransaction();
        try {
            if($data['password'] == null) {
                $data['password'] = Hash::make($user->password);
            }
            $data['updated'] = 1;
            $update = User::where('id', $id)
            ->update($data);
        } catch (QueryException $th) {
            DB::rollback();
            return false;
        }
        Helper::saveLog('Update Pasien : ' . $id, 'event', auth()->id());
        DB::commit();
        return true;
    }
}
