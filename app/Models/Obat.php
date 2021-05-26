<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'obat';
    protected $fillable = [
        'kode',
        'name',
        'jenis',
        'ketentuan',
    ];
}
