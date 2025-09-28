<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izins';

    protected $fillable = [
        'siswa_id',
        'orang_tua_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'bukti',
        'status',
        'catatan_wali',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function orangTua()
    {
        return $this->belongsTo(User::class, 'orang_tua_id');
    }
}
