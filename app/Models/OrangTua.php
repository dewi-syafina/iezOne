<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrangTua extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','siswa_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }



    public function izins()
    {
        return $this->hasMany(Izin::class);
    }
}