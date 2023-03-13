<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kanban extends Model
{
    use HasFactory;
    protected $table = 'kanban_board';
    protected $fillable = ['nip','status','judul','issues','due_date','priority','sprintpoint','userRequest'];

    // 'idUser',
    //  public function user()
    //  {
    //      return $this->belongsTo('App\Models\User', 'nip');
    //  }

    public function pegawai(): belongsTo
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }
}
