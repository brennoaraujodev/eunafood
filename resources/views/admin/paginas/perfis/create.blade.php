@extends('adminlte::page')

@section('title', 'Cadastrar perfil')

@section('content_header')
    <h1>Cadastrar Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('perfis.store')}}" class="needs-validation" novalidate method="POST">
                @include('admin.paginas.perfis._partials.form')
                <button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i> Cadastrar</button>
            </form>
        </div>
    </div>
@endsection


