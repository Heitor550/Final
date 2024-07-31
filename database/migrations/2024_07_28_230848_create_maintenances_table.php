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
    Schema::create('maintenances', function (Blueprint $table) {
        $table->id();
        $table->foreignId('equipamento_id')->constrained();
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('type', ['Corretiva', 'Preventiva']);
        $table->date('date');
        $table->json('items')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
