<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Evento;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Service::paginate(10);
 
        return view('painel.services.services', [
            'servicos' => $servicos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.services.createService');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->only(
            'titulo',
            'duracao',
            'pagamento'
        );

        $validar = $this->validator($dados);

        if($validar->fails()){
            return redirect()
                ->route('service.create')
                ->withErrors($validar)
                ->withInput();
        }

        $zero = strtotime('00:00:00');
        $duracao = date('H:i:s', strtotime($dados['duracao'], $zero));

        $servico = new Service();
        $servico->title = $dados['titulo'];
        $servico->duration = $duracao;
        $servico->durationText = $dados['duracao'];
        $servico->payment = $dados['pagamento'];
        $servico->save();
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servico = Service::find($id);

        if(!$servico){
            return redirect()
                ->route('service.index');
        }

        if($request->filled('action')){
            $servico->paused = $servico->paused == 0 ? '1' : '0';
            $servico->save();
        }

        return redirect()
                ->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('service.index');
    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titulo' => ['required', 'string', 'max:100'],
            'duracao' => ['required', 'string'],
            'pagamento' => ['required', 'string']
        ]);
    }
}
