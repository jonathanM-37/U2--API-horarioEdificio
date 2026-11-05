<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Agrega la clave foránea edificio_id a la tabla aulas.
     */
    public function up(): void
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->unsignedBigInteger('edificio_id')->nullable()->after('wifi');
            $table->foreign('edificio_id')
                  ->references('id')
                  ->on('edificios')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->dropForeign(['edificio_id']);
            $table->dropColumn('edificio_id');
        });
    }
};
