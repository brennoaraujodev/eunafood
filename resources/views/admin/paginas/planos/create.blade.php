@extends('adminlte::page')

@section('title', 'Cadastrar plano')

@section('content_header')
    <h1>Cadastrar Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('planos.store')}}" class="needs-validation" novalidate method="POST">
                @csrf
                @include('admin.paginas.planos._partials.form')
            </form>
        </div>
    </div>
@endsection


