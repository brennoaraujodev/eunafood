@include('admin.includes.alerts')

<div class="form-row">
    <div class="col-md-12 mb-3">
      <label>Nome do perfil</label>
      <input type="text" class="form-control" name="nome"  placeholder="Nome do Plano" value="{{$plano->nome ?? old('nome')}}" required>
    </div>
</div>

<div class="form-row">
      <div class="col-md-12 mb-3">
        <label>Descrição</label>
        <input type="text" class="form-control" name="descricao"  placeholder="Descrição do Plano" value="{{$plano->descricao ?? old('descricao')}}" required>
      </div>
</div>



