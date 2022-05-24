<div class="container mb-3">
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid d-flex">
            <div class="right align-self-start mt-1 ">
                <a class="navbar-brand text-light" href="{{route('index')}}">Agendaria</a>
            </div>

            @if(Auth::user() && Auth::user()->admin != '0')
                <div class="dropdown-center right align-self-start mt-1 ">
                    <button class="btn btn-sm btn-outline-secondary" type="button" id="notificacao" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(count($pendentes) > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{count($pendentes)}}</span>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                        </svg>
                    </button>
                    @if(count($pendentes) > 0)
                        <ul id="listaNotificacao" class="dropdown-menu dropdown-menu-dark" aria-labelledby="notificacao">
                            @foreach($pendentes as $pendente)
                                <div class="alert alert-danger d-flex flex-column">
                                    <span class="fs-6">Novo Cliente: </span>
                                    <span class="fs-6"><strong> <a class="text-dark" href="{{route('filtrarPendentes')}}">{{$pendente->title}}</a> </strong></span>
                                </div>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif



            <div class="left">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('index')}}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('painelIndex')}}">{{ Auth::user() ? 'Painel' : 'Entrar' }}</a>
                        </li>
                        @if(Auth::user())
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{route('logout')}}">Sair</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>