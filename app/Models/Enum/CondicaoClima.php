<?php

namespace App\Models\Enum;

use Illuminate\Database\Eloquent\Model;

class CondicaoClima extends Model
{
    public static function condicoes($clima = null)
    {
        $condicoes = [
            395 => 'Neve moderada ou forte com trovões',
            392 => 'Neve leve com trovões',
            389 => 'Chuva moderada ou forte com trovões',
            386 => 'Chuva leve com trovões',
            377 => 'Chuva de granizo moderada ou forte',
            374 => 'Chuva leve de granizo',
            371 => 'Chuva de neve moderada ou forte',
            368 => 'Chuva leve de neve',
            365 => 'Chuva de granizo moderada ou forte',
            362 => 'Chuva leve de granizo',
            359 => 'Chuva torrencial',
            356 => 'Chuva moderada ou forte',
            353 => 'Chuva leve',
            350 => 'Granizo',
            338 => 'Neve pesada',
            335 => 'Neve pesada em áreas com granizo',
            332 => 'Neve moderada',
            329 => 'Neve moderada com granizo',
            326 => 'Neve leve',
            323 => 'Neve leve com granizo',
            320 => 'Neve moderada ou forte',
            317 => 'Neve leve',
            314 => 'Chuva congelante moderada ou forte',
            311 => 'Chuva congelante leve',
            308 => 'Chuva forte',
            305 => 'Chuva forte às vezes',
            302 => 'Chuva moderada',
            299 => 'Chuva moderada às vezes',
            296 => 'Chuva leve',
            293 => 'Chuva leve às vezes',
            284 => 'Chuviscos congelantes fortes',
            281 => 'Chuviscos congelantes',
            266 => 'Chuvisco leve',
            263 => 'Chuvisco leve às vezes',
            260 => 'Nevoeiro congelante',
            248 => 'Nevoeiro',
            230 => 'Tempestade de neve',
            227 => 'Neve soprada pelo vento',
            200 => 'Trovões nas proximidades',
            185 => 'Chuviscos congelantes nas proximidades',
            182 => 'Granizo nas proximidades',
            179 => 'Neve nas proximidades',
            176 => 'Chuva nas proximidades',
            143 => 'Nevoeiro leve',
            122 => 'Nublado',
            119 => 'Nublado',
            116 => 'Parcialmente nublado',
            113 => 'Claro/Ensolarado',
        ];

        if (!$clima) return $condicoes;

        return $condicoes[$clima] ?? 'Desconhecido';
    }
}
