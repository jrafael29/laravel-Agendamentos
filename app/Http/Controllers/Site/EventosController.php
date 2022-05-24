<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\Service;

class EventosController extends Controller
{

    // não mexa nesse método, pelo seu bem;
    public function agendarEvento(Request $request)
    {
        $dados = $request->only('nome', 'cor', 'servico', 'data', 'horario', 'duracao');


        // pegando a duração do serviço
        $servico = Service::where('title', $dados['servico'])->first();
        $tempo = $servico->durationText;

        $data = $dados['data'];
        $start = $data." ". date("H:i:s", strtotime($dados['horario'])) ;
        $horarioInicial = strtotime($dados['horario']);
        $end = $data." ". date("H:i:s", strtotime('+'.$tempo, $horarioInicial));

        if(explode(" ", $end)[1] > "17:00:00")
        {
            return redirect()
            ->route('index')
            ->with('warning', 'Seu horario não pode passar do horario de fechamento. <br> Tente outro horario/dia!');
        }
        $temEvento = Evento::where('start', '=' ,$start)
                ->first();
        if($temEvento)
        {
            $finalExistente = explode(" ",$temEvento->end);
            $inicioExistente = explode(" ", $temEvento->start);
            $finalEnviado = explode(" ",$end);
            $inicioEnviado = explode(" ", $start);
            if(($inicioEnviado[0]) == ($inicioExistente[0]) )
            {       
                if($finalEnviado[1] > $inicioExistente[1]){
                    if(($finalExistente[1] >= $finalEnviado[1]) || ($inicioEnviado[1] < $finalExistente[1]) )
                    {          
                        return redirect()
                            ->route('index')
                            ->with('warning', 'Já tem um agendamento nesse horario'); 
                    }         
                }
            }
        }

        // echo " horario final do enviado pelo usuario << " . explode(" ",$end)[1] . " horario inicial do que existe  " .  explode(" ",$temEvento->start)[1] ;

        $evento = new Evento();
        $evento->title = $dados['nome'];
        $evento->description = $dados['servico'];
        $evento->color = $servico->color;
        $evento->start = $start;
        $evento->end = $end;
        $evento->save();
        
        return redirect()
            ->route('index')
            ->with('warning', 'Seu agendamento foi feito. <br> Aguarde um administrador aceita-lo.');
    }

    public function excluirEvento(Request $request)
    {
        return true;
    }
}
