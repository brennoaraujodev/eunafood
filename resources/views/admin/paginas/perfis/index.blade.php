@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>perfis <a href="{{route('perfis.create')}}" class="btn btn-success"> <i class="fas fa-plus-square"></i> Cadastrar</a></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">perfis</li>
        </ol>
      </nav>

@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form action="{{route('perfis.index')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filtro" placeholder="Nome do perfil" value="{{$filtros['filtro'] ?? ''}}" class="form-control">
                <button type="submit" class="btn btn-primary ml-1">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col" width='300'>Opções</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($perfis as $perfil )
                        <tr>
                            <td>
                                {{$perfil->nome}}
                            </td>
                            <td>
                                {{$perfil->descricao}}
                            </td>
                            <td>
                                <a href="{{route('perfis.index',$perfil->id)}}" class="btn btn-primary" ><i class="fas fa-file-alt"></i> Detalhes</a>
                                <a href="{{route('perfis.show',$perfil->id)}}" class="btn btn-info"><i class="fas fa-file-alt"></i> Abrir</a>
                                <a href="{{route('perfis.edit',$perfil->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                   @endforeach
                </tbody>
              </table>
        </div>
        @if (isset($filtros))
            <div class="row d-flex justify-content-center">
                {!! $perfis->appends($filtros)->links() !!}
            </div>

        @else
            <div class="row d-flex justify-content-center">
                {!! $perfis->links() !!}

            </div>
        @endif


    </div>
@endsection


