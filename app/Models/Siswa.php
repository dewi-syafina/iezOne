<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nis','nama','kelas','password','orangtua_id'];
    protected $hidden = ['password','remember_token'];

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class, 'orangtua_id');
    }
}