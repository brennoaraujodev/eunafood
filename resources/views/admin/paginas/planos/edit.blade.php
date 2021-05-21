@extends('adminlte::page')

@section('title', "Editando o plano {$plano->nome}")

@section('content_header')
    <h1>Editando o plano: {{$plano->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('planos.update',$plano->url)}}" class="needs-validation" novalidate method="POST">
                @csrf
                @method('PUT')
                @include('admin.paginas.planos._partials.form')
              </form>
        </div>
    </div>
@endsection


