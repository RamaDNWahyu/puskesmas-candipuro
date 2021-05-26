<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTBS extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'mtbs';
    protected $fillable = [
        'no_rm',
        'nama_anak',
        'gender',
        'berat_badan',
        'tinggi',
        'suhu',
        'keluhan',
        'kunjungan_pertama',
        'kunjungan_ulang',
        'tanda_bahaya',
        'batuk',
        'batuk_lama',
        'demam',
        'demam_lama',
        'demam_tiap_hari',
        'diare',
        'diare_lama',
        'darah_demam',
        'klasifikasi_bahaya_umum',
        'tindakan_bahaya_umum',
        'hasil_rdt',
        'hasil_sdm',
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'no_rm', 'no_rm');
    }
}
