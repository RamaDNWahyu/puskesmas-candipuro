<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'type',
        'user_id'
    ];

    public function pengguna()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
