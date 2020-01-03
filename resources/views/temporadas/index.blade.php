@extends('layout')

@section('cabecalho')
Temporadas Série {{ $serie->nome }}
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach($temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Temporada {{ $temporada->numero }}
        <span class="d-flex">
            <a href="/series/{{ $serie->id }}/{{ $temporada->id }}" class="btn btn-sm mr-1">
                <span class="badge badge-secondary">
                    0 / {{ $temporada->episodios->count() }}
                </span>
            </a>
        </span>
    </li>
    @endforeach
</ul>
@endsection