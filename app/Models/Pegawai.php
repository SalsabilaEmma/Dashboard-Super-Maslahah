<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = ['nip', 'noKtp', 'nama', 'jenisKelamin', 'tglLahir', 'statusPerkawinan', 'alamat', 'telepon', 'tglMasuk', 'rekeningTabungan', 'penempatan', 'statusPegawai', 'jabatan', 'kantor'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }
    public function kanban(): HasMany
    {
        return $this->hasMany(Kanban::class, 'nip', 'nip');
    }    
    public function absen()
    {
        return $this->hasMany('App\Models\Absen', 'nipPegawai');
    }
    public function aktivasi()
    {
        return $this->hasMany('App\Models\Activation', 'nipPegawai');
    }
}
