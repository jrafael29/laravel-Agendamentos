<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function getEventos()
    {
        $todosEventos = Evento::all();

        $eventos = [];

        foreach($todosEventos as $evento){
            if($evento->accepted != '0'){
                $eventos[] = $evento;
            }
        }

        return json_encode($eventos);
    }

    public function getNovoEvento()
    {
        $eventos = Evento::where('accepted', '0')->get();

        return json_encode($eventos);
    }

    public function getToday()
    {
        $diaAtual = date('Y-m-d', strtotime('now'));

        return $diaAtual;
    }
}
