@extends('adminlte::page')

@section('title', 'Cadastrar plano')

@section('content_header')
    <h1>Cadastrar Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('planos.store')}}" class="needs-validation" novalidate method="POST">
                @csrf
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label>Nome do plano</label>
                    <input type="text" class="form-control" name="nome"  placeholder="Nome do Plano" required>
                  </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label>Descrição</label>
                      <input type="text" class="form-control" name="descricao"  placeholder="Descrição do Plano" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label>Preço</label>
                      <input type="text" class="form-control" name="preco"  placeholder="Preço do Plano" required>
                    </div>
                  </div>
                  </div>
                </div>

                <button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i> Finalizar cadastro</button>
              </form>

              <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
              </script>
        </div>
    </div>
@endsection


