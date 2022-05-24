@extends('layouts.site.base')
@section('title', 'Registro')


@section('main')

<div class="card col-6">
    <form action="{{route('loginAttempt')}}" method="post">
        @csrf
        <div class="card-header">
            <span class="fs-3">Fazer Login</span>
        </div>
        <div class="card-body mx-4">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>
            <div class="form-group mb-3">
                <label for="password">Senha:</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <span>
                    Ainda não é cadastrado? <a href="{{route('registro')}}">Cadastre-se</a>
                </span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-around">
            <button class="btn btn-outline-secondary" type="submit">Entrar</button>
            <button class="btn btn-outline-danger" type="reset">Cancelar</button>

        </div>
    </form>
</div>

@endsection