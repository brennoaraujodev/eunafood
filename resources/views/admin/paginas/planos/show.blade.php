@extends('adminlte::page')

@section('title', " Plano {$plano->nome}")

@section('content_header')
    <h1>Plano {{$plano->nome}} <a href="" class="btn btn-warning">Editar</a> </h1>
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

    </div>
@endsection


