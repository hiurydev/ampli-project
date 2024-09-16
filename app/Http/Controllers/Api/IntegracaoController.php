<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Library\Integracao;
use App\Models\Enum\CondicaoClima;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class IntegracaoController extends Controller
{
    public function obterCidadePorCep($cep)
    {
        $consulta = (new Integracao)->obterCidadePorCep($cep);

        return $consulta; 
    }

    public function obterClimaPorCidade($cidade)
    {
        $consulta = (new Integracao)->obterClimaPorCidade($cidade);
        
        if (isset($consulta->current->weather_code)) {
            $consulta->current->weather_descriptions[0] = CondicaoClima::condicoes($consulta->current->weather_code);
        }

        $cidades = Cache::get('cidades_consultadas', []);

        if (!in_array($cidade, $cidades)) {
            $cidades[] = $cidade;
            Cache::put('cidades_consultadas', $cidades, 60);
        }

        return $consulta; 
    }

    public function obterCidadePorCepComparar($cep1, $cep2)
    {
        $consultaPrimeiraCidade = (new Integracao)->obterCidadePorCep($cep1);
        $consultaSegundaCidade = (new Integracao)->obterCidadePorCep($cep2);
        
        return [
            'Cidade1' => $consultaPrimeiraCidade->localidade ?? null,
            'Cidade2' => $consultaSegundaCidade->localidade ?? null,
        ];
    }
}
