@extends('layouts.site.base')
@section('title', 'Registro')


@section('main')

<div class="card col-6">
    <form action="{{route('registroAttempt')}}" method="post">
        @csrf
        <div class="card-header"><span class="fs-3">Fazer Cadastro</span></div>
        <div class="card-body mx-4">
            
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
            @endif

            <div class="form-group mb-3">
                <label class="fs-6" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome" required>
            </div>

            <div class="form-group mb-3">
                <label class="fs-6" for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">Senha:</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group mb-3">
                <label for="password_c">Confirmar Senha:</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_c" required>
            </div>

            <div class="form-group">
                <span>
                    Já possui conta? Faça seu <a href="{{route('login')}}">Login</a>
                </span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-around">
            <button class="btn btn-outline-secondary" type="submit">Cadastrar</button>
            <button class="btn btn-outline-danger" type="reset">Limpar</button>
        </div>
    </form>
</div>

@endsection