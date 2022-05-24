<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public $table = 'eventos';

    public $timestamps = false;

    public $fillable = ['nome', 'telefone', 'evento', 'data', 'horario', 'duracao', 'cor'];
}
