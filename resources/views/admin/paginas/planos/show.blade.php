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
            <form action="{{route('planos.destroy',$plano->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning">Editar</button>
            </form>
            <form action="{{route('planos.destroy',$plano->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger ml-1">Deletar</button>
            </form>
        </div>


    </div>
@endsection


