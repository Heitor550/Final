<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo');
            $table->string('fabricante');
            $table->date('data_aquisicao');
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
};