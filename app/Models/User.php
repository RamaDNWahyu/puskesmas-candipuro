<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ktp',
        'name',
        'nama_kk',
        'email',
        'no_hp',
        'username',
        'tanggal_lahir',
        'gender',
        'alamat',
        'pekerjaan',
        'kepesertaan',
        'verified_at',
        'password',
        'remember_token',
        'role',
        'no_rm',
        'updated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeNotVerified($query)
    {
        return $query->whereNull('verified_at');
    }

    public function berobat()
    {
        return $this->hasMany(Berobat::class, 'no_rm', 'no_rm');
    }
}
