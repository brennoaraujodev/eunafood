@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{route('planos.create')}}" class="btn btn-success"> Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
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
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col" width='130'>Saiba mais</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($planos as $plano )
                        <tr>
                            <td>
                                {{$plano->nome}}
                            </td>
                            <td>
                                {{number_format($plano->preco,2,',','.')}}
                            </td>
                            <td>
                                <a href="{{route('planos.show',$plano->url)}}" class="btn btn-info" width='10px'>Clique aqui</a>
                            </td>
                        </tr>
                   @endforeach
                </tbody>
              </table>
        </div>
        @if (isset($filtros))
            <div class="row d-flex justify-content-center">
                {!! $planos->appends($filtros)->links() !!}
            </div>

        @else
            <div class="row d-flex justify-content-center">
                {!! $planos->links() !!}

            </div>
        @endif


    </div>
@endsection


