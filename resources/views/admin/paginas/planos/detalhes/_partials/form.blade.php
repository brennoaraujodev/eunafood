@include('admin.includes.alerts')

<div class="form-row">
    <div class="col-md-12 mb-3">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome"  placeholder="Nome" value="{{$detalhe->nome ?? old('nome')}}" required>
    </div>
</div>

<button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i> Enviar</button>


