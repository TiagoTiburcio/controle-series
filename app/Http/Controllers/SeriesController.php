<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriarSerie;
use App\Services\RemovedorSerie;
use App\Temporada;
use Illuminate\Http\Request;


class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = serie::query()
            ->orderby('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriarSerie $criadorSerie)
    {
        $serie = $criadorSerie->create(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()
            ->flash(
                "mensagem",
                "Serie ID: $serie->id Nome: $serie->nome e suas Temporadas e Episodios. Inserida com sucesso!!"
            );
        return redirect('/series');
    }

    public function destroy(Request $request, RemovedorSerie $removerSerie)
    {
        $nomeSerie = $removerSerie->remove($request->id);

        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
        return redirect('/series');
    }

    public function editaNome($id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
