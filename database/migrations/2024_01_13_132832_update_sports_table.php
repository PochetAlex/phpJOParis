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
        Schema::table('sports', function (Blueprint $table) {
            $table->string('url_media')->default('images/alistar.png');
            $table->foreignId('user_id')->default('UTILISATEUR')->constrained()->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sports', function (Blueprint $table) {
            $table->dropColumn('url_media');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
