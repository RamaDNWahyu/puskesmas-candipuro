<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berobat extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'berobat';
    protected $fillable = [
        'no_rm',
        'no_urut',
        'waktu_daftar',
        'jenis_kunjungan',
        'status',
        'tanggal',
        'rujukan',
        'kepesertaan',
        'kunjungan',
        'kasus',
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'no_rm', 'no_rm');
    }

    public function hasil_pemeriksaan()
    {
        return $this->hasOne(HasilPemeriksaan::class, 'id_berobat', 'id');
    }
}
