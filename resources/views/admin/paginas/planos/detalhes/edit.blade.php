@extends('adminlte::page')

@section('title', "Editando o detalhe do plano {$plano->nome}")

@section('content_header')
    <h1>Editando o detalhe do plano: {{$plano->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('planosdetalhes.update',[$plano->url, $detalhe->id])}}" class="needs-validation" novalidate method="POST">
                @csrf
                @method('PUT')
                @include('admin.paginas.planos.detalhes._partials.form')
              </form>
        </div>
    </div>
@endsection
