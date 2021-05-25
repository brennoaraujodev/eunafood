@extends('adminlte::page')

@section('title', " perfil {$perfil->nome}")

@section('content_header')
    <h1>perfil {{$perfil->nome}} </h1>
@stop
@section('content')
    <div class="card">

        <div class="card-body">
            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{$perfil->id}}</td>
                    </tr>
                  <tr>
                    <th scope="row">Nome</th>
                    <td>{{$perfil->nome}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$perfil->descricao}}</td>
                  </tr>
                  <tr>
                </tbody>
              </table>
        </div>

        <div class="card-footer form form-inline">
            <a href="{{route('perfis.edit',$perfil->id)}}" class="btn btn-warning" width='20px'><i class="fas fa-edit"></i> Editar</a>
            <form action="{{route('perfis.destroy',$perfil->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#excluirperfil"><i class="fas fa-trash-alt"></i> Excluir</button>
                <!-- Modal -->
                <div class="modal fade" id="excluirperfil" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">Excluir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Deseja excluir es perfil?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-primary">Sim, desejo excluir</button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>


    </div>
@endsection


