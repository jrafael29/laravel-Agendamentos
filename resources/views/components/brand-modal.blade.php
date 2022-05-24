<!-- Button trigger modal -->
<button style="display: none;" id="btnModal" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#brandModal">
    Fazer um agendamento
</button>
  
  <!-- Modal -->
<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="brandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered p-4">
        <div class="modal-content">
            <form class="form" method="POST" action="{{ route('agendar') }}">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="brandModalLabel">Agendar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="fs-6" for="nome">Nome:</label>
                        <input class="form-control" autocomplete="off" type="text" name="nome" id="nome" required>
                    </div>

                    <label for="servico">Serviço:</label>
                    <div class="form-group mt-2 mb-3 d-flex flex-column flex-wrap flex-sm-row justify-content-evenly">
                        
                        @foreach($servicos as $servico)

                            @if($servico->paused == 0)
                                <div class="form-check">
                                    <input class="form-check-input" checked type="radio" name="servico" value="{{$servico->title}}" id="{{$servico->id}}">
                                    <input type="hidden" name="duracao" value="{{$servico->durationText}}">
                                    <label class="form-check-label" for="{{$servico->id}}">
                                        {{$servico->title}}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        
                    </div>    

                    {{-- <div class="form-group mb-3">
                        <label class="fs-6" for="telefone">Telefone:</label>
                        <input class="form-control" type="tel" name="telefone" id="telefone">
                    </div> --}}
                    {{-- <div class="form-group mb-3">
                        <label class="fs-6" for="cor">Escolha uma cor:</label>
                        <input class="form-control" type="color" name="cor" id="cor">
                    </div> --}}

                    <div class="form-group mb-3">
                        <label class="fs-6" for="date">Data:</label>
                        <input class="form-control" disabled type="datetime" name="data" value="" id="dataBr">
                        <input class="form-control" readonly type="hidden" name="data" value="" id="data">
                    </div>
                    <div class="form-group mb-3">
                        <label class="fs-6" for="horario">Horario:</label>
                        <input class="form-control" readonly type="time" name="horario" value="" id="horario">
                    </div>

                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agendar</button>
                </div>
            </form>
        </div>
    </div>
</div>