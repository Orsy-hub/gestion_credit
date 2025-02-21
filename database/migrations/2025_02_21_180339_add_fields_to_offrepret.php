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
        Schema::table('offrepret', function (Blueprint $table) {
            // Le champs pour le titre de l'offre d'emprunt.
            $table->string('titre', 100)->after('bayeur_id');
            $table->longText('conditions')->nullable()->after('titre');
            $table->date('date_limite')->nullable()->after('date_offre');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offrepret', function (Blueprint $table) {
            //
            $table->dropColumn(['titre', 'conditions', 'date_limite']);
        });
    }
};
