<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'hasil_pemeriksaan';
    protected $fillable = [
        'no_rm',
        'id_berobat',
        'keluhan',
        'diagnosa',
        'terapi',
        'keterangan',
    ];

    public function berobat()
    {
        return $this->hasOne(Berobat::class, 'id', 'id_berobat');
    }

    public function pasien()
    {
        return $this->hasOne(User::class, 'no_rm', 'no_rm');
    }
}
