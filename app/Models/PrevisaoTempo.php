<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrevisaoTempo extends Model
{
    use HasFactory;

    protected $table = 'previsoes_tempo';

    protected $fillable = [
        'name',
        'cidade',
        'pais',
        'regiao',
        'temperatura',
        'descricao_clima',
        'icone_clima',
        'velocidade_vento',
        'umidade',
        'pressao',
        'condicao_clima',
        'dia',
        'direcao_vento',
        'sensacao_termica',
        'nebulosidade',
        'visibilidade',
        'data_horario_local'
    ];

    public function rules()
    {
        return [
            'cidade' => 'required|max:100',
            'pais' => 'required|max:100',
            'regiao' => 'required|max:100',
            'descricao_clima' => 'required|max:255',
            'icone_clima' => 'required|max:255',
            'velocidade_vento' => 'required|numeric',
            'umidade' => 'required|numeric',
            'pressao' => 'required|numeric',
            'condicao_clima' => 'required|numeric',
            'dia' => 'required|numeric',
            'direcao_vento' => 'required|string',
            'sensacao_termica' => 'required|numeric',
            'nebulosidade' => 'required|numeric',
            'visibilidade' => 'required|numeric'
        ];
    }

    public function names()
    {
        return [
            'cidade' => 'Nome da cidade',
            'pais' => 'Nome do país',
            'regiao' => 'Região',
            'descricao_clima' => 'Descrição do clima',
            'icone_clima' => 'Ícone do clima',
            'velocidade_vento' => 'Velocidade do vento',
            'umidade' => 'Umidade',
            'pressao' => 'Pressão',
            'condicao_clima' => 'Condição do clima',
            'dia' => 'É dia?',
            'direcao_vento' => 'Direção do vento',
            'sensacao_termica' => 'Sensação térmica',
            'nebulosidade' => 'Nebulosidade',
            'visibilidade' => 'Visibilidade'
        ];
    }
}
