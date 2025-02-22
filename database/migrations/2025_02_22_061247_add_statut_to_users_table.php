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
        Schema::table('emprunts', function (Blueprint $table) {
            //
            $table->enum('status', ['en_attente', 'valide', 'en_cours', 'rembourse', 'refuse', 'annule', 'litige'])->default('en_attente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emprunts', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
    }
};
