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
        // Cria a tabela 'demandas' com as colunas especificadas
        Schema::create('demandas', function (Blueprint $table) {
            $table->id(); // Equivalente a BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('nome_cliente');
            $table->string('empresa_contratante');
            $table->text('endereco'); // Campo de texto para o endereço completo
            $table->string('engenheiro_responsavel');
            $table->string('contato_vistoria');
            $table->date('data_abertura');
            $table->string('status', 50)->default('Aguardando Agendamento');
            $table->timestamps(); // Cria as colunas `created_at` e `updated_at` automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Apaga a tabela 'demandas' se a migration for revertida
        Schema::dropIfExists('demandas');
    }
};