<div class="form-row">
    <div class="col-md-12 mb-3">
      <label>Nome do plano</label>
      <input type="text" class="form-control" name="nome"  placeholder="Nome do Plano" value="{{$plano->nome ?? ''}}" required>
    </div>
</div>

<div class="form-row">
      <div class="col-md-12 mb-3">
        <label>Descrição</label>
        <input type="text" class="form-control" name="descricao"  placeholder="Descrição do Plano" value="{{$plano->descricao ?? ''}}" required>
      </div>
</div>

<div class="form-row">
      <div class="col-md-12 mb-3">
        <label>Preço</label>
        <input type="text" class="form-control" name="preco"  placeholder="Preço do Plano" value="{{$plano->preco ?? ''}}" required>
      </div>
</div>
<button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i> Enviar</button>


