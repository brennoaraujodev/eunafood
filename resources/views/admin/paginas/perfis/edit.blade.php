@extends('adminlte::page')

@section('title', "Editando o perfil {$perfil->nome}")

@section('content_header')
    <h1>Editando o perfil: {{$perfil->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('perfis.update',$perfil->id)}}" class="needs-validation" novalidate method="POST">
                @csrf
                @method('PUT')
                @include('admin.paginas.perfis._partials.form')
                <button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i> Editar</button>
              </form>
        </div>
    </div>
@endsection


