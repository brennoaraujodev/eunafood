@extends('adminlte::page')

@section('title', "Permissões do Perfil '{$perfil->nome}'")

@section('content_header')
    <h1>Permissões do Perfil '{{$perfil->nome}}' <a href="{{route('perfis.permissoes.create',$perfil->id)}}" class="btn btn-success"> <i class="fas fa-plus-square"></i> Aicionar permissões </a></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">permissoes</li>
        </ol>
      </nav>

@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form action="{{route('permissoes.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filtro" placeholder="Nome do permissao" value="{{$filtros['filtro'] ?? ''}}" class="form-control ml-1 mr-1 mb-1 mt-1">
                <button type="submit" class="btn btn-primary ml-1 mr-1 mb-1 mt-1"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col" width='180'>Opções</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($permissoes as $permissao )
                        <tr>
                            <td>
                                {{$permissao->nome}}
                            </td>
                            <td>
                                {{$permissao->descricao}}
                            </td>
                            <td>
                                <a href="{{route('permissoes.show',$permissao->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{route('permissoes.edit',$permissao->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{route('permissoes.edit',$permissao->id)}}" class="btn btn-danger"><i class="fas fa-user-lock"></i></a>
                            </td>
                        </tr>
                   @endforeach
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


