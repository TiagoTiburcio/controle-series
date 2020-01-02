<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(int $serieId, int $temporadaId)
    {  
        $serie = Serie::find($serieId);
        $temporada = Temporada::find($temporadaId);
        $episodios = $temporada->episodios;

        return view(
            'episodios.index',
            compact('serie', 'temporada','episodios')
        );
    }
}
