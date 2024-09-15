<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('previsoes_tempo', function (Blueprint $table) {
            $table->id();
            $table->string('cidade', 100);
            $table->string('pais', 100);
            $table->string('regiao', 100);
            $table->float('temperatura');
            $table->string('descricao_clima', 255);
            $table->string('icone_clima', 255);
            $table->float('velocidade_vento');
            $table->float('umidade');
            $table->float('pressao');
            $table->integer('condicao_clima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previsoes_tempo');
    }
};
