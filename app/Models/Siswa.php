<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','nama','kelas'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }


    public function izins()
    {
        return $this->hasMany(Izin::class);
    }
}