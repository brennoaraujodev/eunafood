@extends('adminlte::page')

@section('title', "Permissões disponíveis para o Perfil '{$perfil->nome}'")

@section('content_header')
    <h1>Permissões disponíveis para o perfil '{{ $perfil->nome }}'</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Perfil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Permissões</li>
        </ol>
    </nav>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissoes.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filtro" placeholder="Nome do permissao" value="{{ $filtros['filtro'] ?? '' }}"
                    class="form-control ml-1 mr-1 mb-1 mt-1">
                <button type="submit" class="btn btn-primary ml-1 mr-1 mb-1 mt-1"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50px">#</th>
                        <th scope="col">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('perfis.permissoes.store', $perfil->id) }}" method="POST">
                        @csrf
                        @foreach ($permissoes as $permissao)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissoes[]" value="{{ $permissao->id }}">
                                </td>
                                <td>
                                    {{ $permissao->nome }}
                                </td>
                            </tr>
                        @endforeach


                        @include('admin.includes.alerts')
                        <tr>
                            <td colspan="500">
                                <button type="submite" class="btn btn-primary">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        @if (isset($filtros))
            <div class="row d-flex justify-content-center">
                {!! $permissoes->appends($filtros)->links() !!}
            </div>

        @else
            <div class="row d-flex justify-content-center">
                {!! $permissoes->links() !!}

            </div>
        @endif


    </div>
@endsection
