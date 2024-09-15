<?php

namespace App\Http\Controllers\Api;

use App\Models\PrevisaoTempo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\IntegracaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PrevisaoTempoController extends Controller
{
    public function __construct()
    {
        $this->class = PrevisaoTempo::class;
    }

    public function index(Request $request)
    {
        return $this->class::paginate($request->per_page);
    }

    public function show(int $id)
    {
        $record = $this->class::find($id);

        if (!$record) {
            return response()->json([
                'erro' => 'Previsão do tempo não encontrada'
            ], 204);
        }

        return response()->json($record);
    }

    public function store(Request $request)
    {
        $model = new $this->class;

        $validate = validator($request->all(), $model->rules(), [], $model->names());

        if ($validate->fails()) {
            $messages = $validate->messages();

            return response()->json(['errors' => $messages], 422);
        }

        return response()
            ->json(
                $this->class::create($request->all()),
                201
            );
    }

    public function compararClima ($cidade1, $cidade2) 
    {
        $integracaoController = new IntegracaoController();

        $climaCidade1 = $integracaoController->obterClimaPorCidade($cidade1);
        $climaCidade2 = $integracaoController->obterClimaPorCidade($cidade2);

        return [
            'DataCidade1' => $climaCidade1,
            'DataCidade2' => $climaCidade2,
        ];
    }

    public function obterHistoricoCache()
    {
        return response()->json(Cache::get('cidades_consultadas', []));
    }

    public function removerHistoricoCache()
    {
        Cache::forget('cidades_consultadas');
    }
}
