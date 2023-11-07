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
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable(true);
            $table->string('description')->nullable(true);
            $table->integer('annee_ajout')->nullable(true);
            $table->integer('nb_disciplines')->nullable(true);
            $table->integer('nb_epreuves')->nullable(true);
            $table->datetime('date_debut')->nullable(true);
            $table->datetime('date_fin')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sports');
    }
};
