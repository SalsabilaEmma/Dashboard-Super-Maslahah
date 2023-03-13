<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $fillable = ['tanggal', 'status', 'jamMasuk', 'jamPulang', 'nip','ket'];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'nip', 'nip');
    }
}
