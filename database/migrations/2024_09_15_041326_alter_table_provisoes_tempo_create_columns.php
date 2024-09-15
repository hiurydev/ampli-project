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
        Schema::table('previsoes_tempo', function (Blueprint $table) {
            $table->integer('dia')->after('condicao_clima');
            $table->string('direcao_vento')->after('dia');
            $table->float('sensacao_termica')->after('direcao_vento');
            $table->float('nebulosidade')->after('sensacao_termica');
            $table->float('visibilidade')->after('nebulosidade');
            $table->dateTime('data_horario_local')->after('visibilidade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('previsoes_tempo', function (Blueprint $table) {
            $table->dropColumn(['dia', 'direcao_vento', 'sensacao_termica', 'nebulosidade', 'visibilidade', 'data_horario_local']);
        });
    }
};
