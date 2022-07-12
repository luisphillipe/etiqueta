<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetas extends Model
{
    protected $fillable = [
        'empresa',
        'logo',
        'cliente',
        'nome_equipamento',
        'observacao'
        //'quantidade'
    ];
}
