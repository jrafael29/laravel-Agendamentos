@extends('layouts.painel.base')
@section('title', 'Painel')




@section('main')



    <h1>Bem vindo ao painel</h1>
@if(Auth::user()->admin != 0)
    <div class="d-flex flex-column flex-sm-row justify-content-evenly">
        <div class="col-12 col-sm-4 px-2">
            <div class="info-box mb-1 p-3 bg-success d-flex">
                <span class="info-box-icon elevation-1 d-flex justify-content-center align-items-center col-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                </span>
                <div class="info-box-content px-3 d-flex flex-column">
                    <span class="info-box-text fw-bold">Eventos</span>
                    <span class="info-box-number">{{$countEvents}}</span>
                </div>
            </div>

            <div class="info-link mb-3 d-grid gap-2">
                <a class="btn btn-outline-success" href="{{route('eventosManager')}}">Ver Eventos</a>
            </div>
        </div>

        <div class="col-12 col-sm-4 px-2">
            <div class="info-box mb-1 p-3 bg-info d-flex">
                <span class="info-box-icon elevation-1 d-flex justify-content-center align-items-center col-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                </span>
                <div class="info-box-content d-flex px-3 flex-column">
                    <span class="info-box-text fw-bold">Usuarios</span>
                    <span class="info-box-number">{{$countUsers}}</span>
                </div>
            </div>

            <div class="info-link mb-3 d-grid gap-2">
                <a class="btn btn-outline-info" href="">Ver Usuarios</a>
            </div>
        </div>

        <div class="col-12 col-sm-4 px-2">
            <div class="info-box mb-1 p-3 bg-warning  d-flex">
                <span class="info-box-icon elevation-1 d-flex justify-content-center align-items-center col-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                </span>
                <div class="info-box-content px-3 d-flex flex-column">
                    <span class="info-box-text fw-bold">Serviços</span>
                    <span class="info-box-number">{{$countServices}}</span>
                </div>
            </div>

            <div class="info-link mb-3 d-grid gap-2">
                <a class="btn btn-outline-warning" href="{{route('service.index')}}">Ver Serviços</a>
            </div>
        </div>
    </div>
    <hr>
@endif

@endsection