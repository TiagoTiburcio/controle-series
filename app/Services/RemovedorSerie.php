<?php

namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorSerie
{
    public function remove(int $serieId): string
    {
        DB::beginTransaction();
        $serie = Serie::find($serieId);
        $nomeSerie = $serie->nome;

        $this->removeTemporadas($serie);
        $serie->delete();
        DB::commit();
        return $nomeSerie;
    }

    private function removeTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(
            function (Temporada $temporada) {
                $this->removeEpisodios($temporada);
                $temporada->delete();
            }
        );
    }

    private function removeEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(
            function (Episodio $episodio) {
                $episodio->delete();
            }
        );
    }
}
