<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
   
    protected $fillable = [
        'codigo',
        'nome',
        'logo' 
    ];
}
