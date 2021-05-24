@extends('adminlte::page')

@section('title', "Detalhe do plano {$plano->nome}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"> <a href="{{route('planosdetalhes.index',$plano->url)}}">Planos</a></li>

            <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
        </ol>
    </nav>

    <h1>Detalhes do Plano: {{$plano->nome}} <a href="{{route('planosdetalhes.create',$plano->url)}}" class="btn btn-success"> <i class="fas fa-plus-square"></i> Cadastrar</a></h1>
@stop

@section('content')

    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-header">
            <form action="{{route('planos.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filtro" placeholder="Nome do plano" value="{{$filtros['filtro'] ?? ''}}" class="form-control">
                <button type="submit" class="btn btn-primary ml-1">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Detalhe</th>
                    <th scope="col" width='205'>Opções</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($detalhes as $detalhe)
                        <tr>
                            <td>
                                {{$detalhe->nome}}
                            </td>
                            <td>
                                <a href="{{route('planosdetalhes.show',[$plano->url, $detalhe->id])}}" class="btn btn-info"><i class="fas fa-file-alt"></i> Abrir</a>
                                <a href="{{route('planosdetalhes.edit',[$plano->url,  $detalhe->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                   @endforeach
                </tbody>
              </table>
        </div>
        @if (isset($filtros))
            <div class="row d-flex justify-content-center">
                {!! $detalhes->appends($filtros)->links() !!}
            </div>

        @else
            <div class="row d-flex justify-content-center">
                {!! $detalhes->links() !!}

            </div>
        @endif


    </div>
@endsection


