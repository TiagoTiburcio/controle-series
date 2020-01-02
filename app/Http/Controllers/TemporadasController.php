<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {   /**
        * @var Serie serie
        * @var Temporada[] temporadas 
        */        
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;

        return view(
            'temporadas.index',
            compact('serie', 'temporadas')
        );
    }
}
