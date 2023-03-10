<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = ['nipPegawai', 'noKtp', 'nama', 'jenisKelamin', 'tglLahir', 'statusPerkawinan', 'alamat', 'telepon', 'tglMasuk', 'rekeningTabungan', 'penempatan', 'statusPegawai', 'jabatan', 'kantor'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'nipPegawai');
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
