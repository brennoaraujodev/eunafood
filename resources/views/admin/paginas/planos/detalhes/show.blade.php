@extends('adminlte::page')

@section('title', " Plano {$plano->nome}")

@section('content_header')
    <h1>Detalhe do plano: {{$plano->nome}} </h1>
@stop
@section('content')
    <div class="card">

        <div class="card-body">
            <table class="table table-bordered">

                <tbody>
                  <tr>
                    <th scope="row">Nome</th>
                    <td>{{$detalhe->nome}}</td>
                  </tr>
                </tbody>
              </table>
        </div>

        <div class="card-footer form form-inline">
            <a href="{{route('planosdetalhes.edit',[$plano->url,$detalhe->id])}}" class="btn btn-warning" width='20px'><i class="fas fa-edit"></i> Editar</a>
            <form action="{{route('planosdetalhes.destroy',[$plano->url,$detalhe->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#excluirDetalhe"><i class="fas fa-trash-alt" ></i> Excluir</button>
                <!-- Modal -->
                <div class="modal fade" id="excluirDetalhe" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">Excluir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Deseja realmente excluir este detalhe?
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
