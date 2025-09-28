<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izins'; // sesuaikan jika beda

    protected $fillable = [
        'siswa_id','nama_anak','kelas','status_kehadiran','alasan','bukti','bukti_path','status','tanggal'
    ];

    public function siswa()
    {
        return $this->belongsTo(\App\Models\Siswa::class, 'siswa_id');
    }
}
