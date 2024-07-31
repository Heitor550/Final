<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            if (!Schema::hasColumn('maintenances', 'equipamento_id')) {
                $table->foreignId('equipamento_id')->constrained()->after('id');
            }
            if (!Schema::hasColumn('maintenances', 'title')) {
                $table->string('title')->after('equipamento_id');
            }
            if (!Schema::hasColumn('maintenances', 'description')) {
                $table->text('description')->nullable()->after('title');
            }
            if (!Schema::hasColumn('maintenances', 'type')) {
                $table->enum('type', ['Corretiva', 'Preventiva'])->after('description');
            }
            if (!Schema::hasColumn('maintenances', 'date')) {
                $table->date('date')->after('type');
            }
            if (!Schema::hasColumn('maintenances', 'items')) {
                $table->json('items')->nullable()->after('date');
            }
        });
    }

    public function down()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            // Aqui você pode remover os campos adicionados, se necessário
        });
    }
};