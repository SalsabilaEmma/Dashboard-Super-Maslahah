<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $fillable = ['tanggal', 'status', 'jamMasuk', 'jamPulang', 'nip','namaPegawai','ket'];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo('App\Models\Pegawai', 'nip', 'nip');
    }
}
