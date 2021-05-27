@extends('adminlte::page')

@section('title', "Editando a permissão {$permissao->nome}")

@section('content_header')
    <h1>Editando o permissão: {{$permissao->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('permissoes.update',$permissao->id)}}" class="needs-validation" novalidate method="POST">
                @csrf
                @method('PUT')
                @include('admin.paginas.permissoes._partials.form')
                <button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i> Editar</button>
              </form>
        </div>
    </div>
@endsection


