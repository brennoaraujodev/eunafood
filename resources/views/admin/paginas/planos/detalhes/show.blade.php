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
                <button class="btn btn-danger ml-1"><i class="fas fa-trash-alt"></i> Excluir</button>
            </form>
        </div>


    </div>
@endsection
