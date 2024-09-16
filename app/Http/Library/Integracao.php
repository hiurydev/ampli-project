<?php

namespace App\Http\Library;

use Illuminate\Support\Facades\Log;

class Integracao
{
    public function obterClimaPorCidade($city)
    {
        $apiKey = env('WEATHERSTACK_API_KEY');
        $baseUrl = 'http://api.weatherstack.com/current';

        $client = new \GuzzleHttp\Client();

        try {
            $url = "{$baseUrl}?access_key={$apiKey}&query=" . urlencode($city);

            $res = $client->request('GET', $url);

            $response = json_decode($res->getBody()->getContents());

            return $response;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao consultar clima: ' . $e->getMessage());
            return null;
        }
    }

    public function obterCidadePorCep($cep)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $url = "https://viacep.com.br/ws/{$cep}/json/";

            $res = $client->request('GET', $url);

            $response = json_decode($res->getBody()->getContents());

            return $response;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao consultar clima: ' . $e->getMessage());
            return null;
        }
    }
}
