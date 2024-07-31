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
    Schema::table('events', function (Blueprint $table) {
        if (!Schema::hasColumn('events', 'equipamento_id')) {
            $table->foreignId('equipamento_id')->after('id')->constrained()->onDelete('cascade');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('events', function (Blueprint $table) {
        // Verifica se a coluna existe antes de tentar removê-la
        if (Schema::hasColumn('events', 'equipamento_id')) {
            // Verifica se a chave estrangeira existe antes de tentar removê-la
            $foreignKeys = Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys('events');
            $foreignKeyExists = collect($foreignKeys)->contains(function ($fk) {
                return $fk->getName() === 'events_equipamento_id_foreign';
            });

            if ($foreignKeyExists) {
                $table->dropForeign(['equipamento_id']);
            }
            $table->dropColumn('equipamento_id');
        }
    });
}
};