<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(int $serieId, int $temporadaId, Request $request)
    {
        $serie = Serie::find($serieId);
        $temporada = $serie->temporadas()->find($temporadaId);
        $episodios = $temporada->episodios;
        $mensagem = $request->session()->get('mensagem');       

        return view(
            'episodios.index',
            compact('serie', 'temporada', 'episodios', 'mensagem')
        );
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos) {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });

        $temporada->push();

        $request->session()->flash('mensagem','Episodios Atualizados com Sucesso');

        return redirect()->back();
    }
}
