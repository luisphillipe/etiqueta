<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
        'codigo',
        'nome'
    ];
}
