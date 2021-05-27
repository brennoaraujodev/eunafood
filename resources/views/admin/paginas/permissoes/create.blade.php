@extends('adminlte::page')

@section('title', 'Cadastrar perfil')

@section('content_header')
    <h1>Cadastrar Permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('permissoes.store')}}" class="needs-validation" novalidate method="POST">
                @include('admin.paginas.permissoes._partials.form')
                <button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i> Cadastrar</button>
            </form>
        </div>
    </div>
@endsection


