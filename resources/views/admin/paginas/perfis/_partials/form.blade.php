@include('admin.includes.alerts')
@csrf
<div class="form-row">
    <div class="col-md-12 mb-3">
      <label>Nome do perfil</label>
      <input type="text" class="form-control" name="nome"  placeholder="Nome do perfil" value="{{$perfil->nome ?? old('nome')}}" required>
    </div>
</div>

<div class="form-row">
      <div class="col-md-12 mb-3">
        <label>Descrição</label>
        <input type="text" class="form-control" name="descricao"  placeholder="Descrição do perfil" value="{{$perfil->descricao ?? old('descricao')}}" required>
      </div>
</div>



