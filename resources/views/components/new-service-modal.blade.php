<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Cadastrar Serviço
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <span class="fs-3">Adicionar Serviço</span>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('service.store')}}" method="post">
              @csrf
                <div class="modal-body">
                  <div class="form-group mb-3">
                    <label class="fs-6" for="titulo">Titulo do Serviço:</label>
                    <input class="form-control" type="text" name="titulo" id="titulo">
                  </div>
                  <div class="form-group mb-3">
                      <label class="fs-6"  for="duracao">Duração do serviço:</label>
                      <select class="form-select" name="duracao" id="duracao">
                          <option value="15 minutes">15 minutos</option>
                          <option value="30 minutes">30 minutos</option>
                          <option value="45 minutes">45 minutos</option>
                          <option value="1 hour">1 hora</option>
                          <option value="2 hour">2 hora</option>
                          <option value="3 hour">3 hora</option>
                          <option value="4 hour">4 hora</option>
                        </select>
                  </div>
                  <div class="form-group mb-3">
                      <label class="fs-6" for="pagamento">Forma de pagamento:</label>
                      <select class="form-select" name="pagamento" id="pagamento">
                          <option value="dinheiro">Dinheiro</option>
                          <option value="pix">Pix</option>
                          <option value="cartao">Cartão</option>

                        </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-outline-success">Salvar</button>
                </div>
              </form>
        </div>
    </div>
</div>