<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    use HasFactory;
    protected $table = 'activations';
    protected $fillable = ['id','nipPegawai', 'cif', 'tipeHp', 'statusAktivasi', 'kodeUnik', 'aksesAbsen', 'aksesMpay', 'aksesKpai', 'aksesKunKer', 'aksesListPekerjaan'];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'nipPegawai', 'nip');
    }
}
