@extends('layouts.painel.base')
@section('title', 'Manager')


@section('main')

<div class="d-flex">

    <div class="btn-group">
        <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrar por:
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('eventosManager')}}">Todos</a></li>
            <li><hr class="dropdown-divider"></li>


            <li><a class="dropdown-item disabled fw-bold" href="#">Clientes</a></li>
            <li><a class="dropdown-item" href="{{route('filtrarServicosAsc')}}">Crescente</a></li>
            <li><a class="dropdown-item" href="{{route('filtrarServicosDesc')}}">Decrescente</a></li>
            <li><hr class="dropdown-divider"></li>

            <li><a class="dropdown-item disabled fw-bold" href="#">Status</a></li>
            <li><a class="dropdown-item" href="{{route('filtrarPendentes')}}">Pendentes</a></li>
            <li><a class="dropdown-item" href="{{route('filtrarAprovados')}}">Aprovados</a></li>
            <li><hr class="dropdown-divider"></li>

            <li><a class="dropdown-item disabled fw-bold" href="#">Serviços</a></li>
            <li><a class="dropdown-item" href="{{route('filtrarServicosAsc')}}">Crescente</a></li>
            <li><a class="dropdown-item" href="{{route('filtrarServicosDesc')}}">Decrescente</a></li>

        </ul>
      </div>

    
</div>

<div class="d-flex justify-content-center">
    <div class="col-6 mt-4 d-flex justify-content-center">
        @if(session('warning'))
            <div class="alert alert-danger">
                {{session('warning')}}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
    </div>
</div>


<div class="table-responsive mt-4">
    <table class="table table-striped table-hover">

        <thead class="bg-light">
            <tr class="fw-bold" align="center">
                <td>ID</td>
                <td>Cliente:</td>
                <td>Serviço:</td>
                <td>Inicio:</td>
                <td>Fim:</td>
                <td>Status:</td>
                <td>Ações:</td>
            </tr>
        </thead>
        <tbody>

            @foreach($eventos as $evento)

            <tr class="" align="center">
                <td>{{$evento->id}}</td>
                <td>{{$evento->title}}</td>
                <td>{{$evento->description}}</td>
                <td class="text-nowrap">{{date("d/m/Y", strtotime(explode(" ",$evento->start)[0])) . " às " . explode(" ",$evento->start)[1]}}</td>
                <td class="text-nowrap">{{date("d/m/Y", strtotime(explode(" ",$evento->end)[0])) . " às " . explode(" ",$evento->end)[1]}}</td>
                <td> <span class="p-1 text-white bg-{{$evento->accepted == '0' ? 'danger' : 'secondary'}}">{{$evento->accepted == '0' ? 'Pendente' : 'Aprovado'}}</span></td>
                <td class="h-100 d-flex justify-content-center">
                    <form class="" action="{{route('aprovarEvento', ['id' => $evento->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="action" value="aprove">
                        <button title="Aprovar" class="btn btn-sm btn-outline-secondary" type="submit">V</button>
                    </form>
                    <form class="" action="{{route('deletarEvento', ['id' => $evento->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button title="Excluir" class="btn btn-sm btn-outline-danger" type="submit">X</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>
</div>

{{$eventos->links()}}
@endsection