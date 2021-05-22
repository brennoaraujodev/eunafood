@extends('adminlte::page')

@section('title', " Plano {$plano->nome}")

@section('content_header')
    <h1>Plano {{$plano->nome}} </h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <table class="table table-bordered">

                <tbody>
                  <tr>
                    <th scope="row">Nome</th>
                    <td>{{$plano->nome}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$plano->descricao}}</td>
                  </tr>
                  <tr>
                    <th scope="row">URL</th>
                    <td>www.eunafood.com.br/planos/{{$plano->url}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Preço</th>
                    <td>{{number_format($plano->preco,2,',','.')}}</td>
                  </tr>
                </tbody>
              </table>
        </div>

        <div class="card-footer form form-inline">
            <a href="{{route('planos.edit',$plano->url)}}" class="btn btn-warning" width='20px'><i class="fas fa-edit"></i> Editar</a>
            <form action="{{route('planos.destroy',$plano->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger ml-1"><i class="fas fa-trash-alt"></i> Excluir</button>
            </form>
        </div>


    </div>
@endsection


