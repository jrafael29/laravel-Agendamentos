@extends('layouts.painel.base')

@section('title', 'Serviços')


@section('main')
<h1>Serviços</h1>




<x-new-service-modal/>





<div class="table-responsive mt-3">
    <table class="table">

        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Titulo</th>
                <th>Duração</th>
                <th>Criado em:</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicos as $servico)
            <tr align="center">
                <td>{{$servico->id}}</td>
                <td>{{$servico->title}}</td>
                <td>{{$servico->duration}}</td>
                <td>{{date('d/m/Y', strtotime(explode(" ", $servico->created_at)[0]))}}</td>
                <td class="d-flex justify-content-center">
                    
                    <form class="d-inline px-1" action="{{route('service.update', ['service' => $servico->id])}}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="action" value="pause">
                        <button class="btn btn-sm btn-outline-{{$servico->paused == 0 ? 'warning' : 'secondary'}} px-1" type="submit">{{$servico->paused == 0 ? 'Pausar' : 'Retomar'}}</button>
                    </form>

                    <form class="d-inline px-1" method="post" action="{{route('service.destroy', ['service' => $servico->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger px-1" type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$servicos->links()}}
@endsection