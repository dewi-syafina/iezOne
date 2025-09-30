<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orang_tuas';
    protected $fillable = ['user_id','nama'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function siswa() {
        return $this->hasMany(Siswa::class, 'orangtua_id');
    }
}
