<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = ['name','email','password','role'];
    protected $hidden = ['password','remember_token'];

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class, 'user_id');
    }

    public function isOrangTua() { return $this->role === 'orang_tua'; }
    public function isWaliKelas() { return $this->role === 'wali_kelas'; }
    public function isSiswa() { return $this->role === 'siswa'; }
}
