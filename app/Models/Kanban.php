<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{
    use HasFactory;
    protected $table = 'kanban_board';
    protected $fillable = ['idUser','status','judul','issues','due_date','priority','sprintpoint'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idUser');
    }
}
