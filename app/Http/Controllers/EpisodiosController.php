<?php
namespace App\Http\Controllers;

use App\Episodios;
use Illuminate\Http\Request;

class EpisodiosController extends BaseController
{

    public function __construct()
    {
        $this->class = Episodios::class;
    }

    public function perSeries(int $serieId, Request $request)
    {
        $episodios = Episodios::query()
        ->where('serie_id', $serieId)
        ->paginate($request->per_page);

        return $episodios;
    }

}
