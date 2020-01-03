<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriarSerie
{
    public function create(string $nome, int $qtdTemporadas, int $qtdEpisodios)
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nome]);
        $this->createTemporada($serie, $qtdTemporadas, $qtdEpisodios);
        DB::commit();
        return $serie;
    }

    private function createEpisodios(Temporada $temporada, int $qtdEpisodios)
    {
        for ($i = 1; $i <= $qtdEpisodios; $i++) {
            $temporada->episodios()->create(['numero' => $i]);
        }
    }

    private function createTemporada(
        Serie $serie,
        int $qtdTemporadas,
        int $qtdEpisodios
    ) {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->createEpisodios($temporada, $qtdEpisodios);
        }
    }
}
