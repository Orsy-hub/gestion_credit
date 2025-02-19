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
        Schema::create('offre_prets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bayeur_id')->constrained('users')->onDelete('cascade');
            $table->integer('montant');
            $table->integer('taux_interet');
            $table->date('date_offre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offre_prets');
    }
};
