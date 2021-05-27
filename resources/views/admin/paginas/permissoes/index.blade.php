@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Permissões <a href="{{route('permissoes.create')}}" class="btn btn-success"> <i class="fas fa-plus-square"></i> Cadastrar</a></h1>
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
                <input type="text" name="filtro" placeholder="Nome da permissao" value="{{$filtros['filtro'] ?? ''}}" class="form-control">
                <button type="submit" class="btn btn-primary ml-1"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col" width='130'>Opções</th>
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
                                <div class="d-grid gap-2 d-md-block">
                                    <a href="{{route('permissoes.show',$permissao->id)}}" class="btn btn-info" type="buttom"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('permissoes.edit',$permissao->id)}}" class="btn btn-warning" type="buttom"><i class="fas fa-edit"></i></a>
                                </div>
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


