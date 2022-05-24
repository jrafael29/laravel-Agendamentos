@extends('layouts.site.base')

@section('title', 'Home')

@section('main')


<section>
    <div class="container d-flex justify-content-center mb-4">
        <x-brand-modal/>
    </div>
</section>

<section>
    <div class="container border-bottom pb-3 mb-3">
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading">Faça Seu Agendamento</h4>
            <hr>
            <p class="mb-0">Escolha o melhor horario para você, e agende sua presença em nosso salão. </p>
          </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-6 mt-4 d-flex justify-content-center">
            @if(session('warning'))
                <div class="alert alert-danger">
                    {!!session('warning')!!}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {!!session('success')!!}
                </div>
            @endif
        </div>
    </div>

    <div class="container calendar ">
        
    </div>

    <div class="col-12 info p-3 d-flex justify-content-evenly flex-sm-row flex-column flex-wrap">
        @foreach($servicos as $servico)
            @if($servico->paused == 0)
                <span class=" col-12 col-sm-4 col-md-3 d-flex justify-content-center p-1 align-items-center mb-2 border border-dark rounded-3">
                    {{$servico->title}}<div class="mx-2" style="height: 15px; width:15px; border-radius: 100%; background-color: {{$servico->color}};"></div>
                </span>
            @endif
        @endforeach
    </div>

</section>
    

@endsection
