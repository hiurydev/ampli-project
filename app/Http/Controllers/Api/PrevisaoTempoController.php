<?php

namespace App\Http\Controllers\Api;

use App\Models\PrevisaoTempo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
