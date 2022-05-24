<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoManagerController extends Controller
{
    public function index()
    {
        $eventos = Evento::paginate(10);

        

        return view('painel.manager.eventos', [
            'eventos' => $eventos
        ]);
    }

    public function aprovarEvento(Request $request, $id)
    {
        $action = $request->input('action');

        if($action == 'aprove'){
            $evento = Evento::find($id);
            if($evento){
                $evento->accepted = '1';
                $evento->save();

                return redirect()
                    ->route('eventosManager')
                    ->with('success', 'Evento aprovado!');
            }
            return redirect()
                ->route('eventosManager')
                ->with('warning', 'Evento não encontrado!');
        }
    }

    public function deletarEvento(Request $request, $id)
    {
        $evento = Evento::find($id);

        if($evento){
            $evento->delete();
            return redirect()
                ->route('eventosManager')
                ->with('warning', 'Evento excluido com sucesso!');
        }
    }

    public function filtrarPendentes()
    {
        $pendentes = Evento::where('accepted', '0')->paginate(10);
        $eventos = Evento::paginate(10);
        if(count($pendentes) == 0){
            return view('painel.manager.eventos', [
                'eventos' => $eventos
            ]);
        }
        return view('painel.manager.eventos', [
            'eventos' => $pendentes
        ]);
    }
    public function filtrarAprovados()
    {
        $aprovados = Evento::where('accepted', '1')->paginate(10);
        $eventos = Evento::paginate(10);
        if(count($aprovados) == 0){
            return view('painel.manager.eventos', [
                'eventos' => $eventos
            ]);
        }
        return view('painel.manager.eventos', [
            'eventos' => $aprovados
        ]);
    }

    public function filtrarServicosDesc()
    {
        $servicosDesordenado = Evento::orderBy('description', 'desc')->paginate(10);
        return view('painel.manager.eventos', [
            'eventos' => $servicosDesordenado
        ]);

    }
    public function filtrarServicosAsc()
    {
        $servicosOrdenado = Evento::orderBy('description', 'asc')->paginate(10);
        return view('painel.manager.eventos', [
            'eventos' => $servicosOrdenado
        ]);

    }



    public function filtrarClientesDesc()
    {
        $clientesDesordenado = Evento::orderBy('title', 'desc')->paginate(10);
        return view('painel.manager.eventos', [
            'eventos' => $clientesDesordenado
        ]);
    }
    public function filtrarClientesAsc()
    {
        $clientesOrdenado = Evento::orderBy('title', 'asc')->paginate(10);
        return view('painel.manager.eventos', [
            'eventos' => $clientesOrdenado
        ]);
    }
}
