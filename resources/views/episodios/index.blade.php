@extends('layout')

@section('cabecalho')
Série {{ $serie->nome }} Temporada {{ $temporada->numero }}
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach($episodios as $episodio)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Episódio {{ $episodio->numero }} 
        <span class="d-flex">
            <a href="#" class="btn btn-primary btn-sm mr-1">
                <i class="fas fa-external-link-alt"></i>
            </a>            
        </span>       
    </li>
    @endforeach
</ul>
@endsection