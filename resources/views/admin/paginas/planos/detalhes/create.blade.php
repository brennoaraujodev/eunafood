@extends('adminlte::page')

@section('title', 'Cadastrar Descrição')

@section('content_header')
    <h1>Cadastrar Descrição do plano {{$plano->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('planosdetalhes.store',$plano->url)}}" class="needs-validation" novalidate method="POST">
                @csrf
                @include('admin.paginas.planos.detalhes._partials.form')
            </form>
        </div>
    </div>
@endsection
