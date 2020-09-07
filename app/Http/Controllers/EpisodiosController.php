<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends BaseCrud
{
    public function __construct()
    {
        $this->class = Episodio::class;
    }

    public function buscaPorSerie(int $serie_id)
    {
        return Episodio::query()
            ->where('serie_id', '=' , $serie_id)
            ->paginate();
    }
}
