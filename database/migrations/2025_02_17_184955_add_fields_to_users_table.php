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
    Schema::table('users', function (Blueprint $table) {
        $table->integer('solde')->default(0)->after('role'); // Solde par défaut à 0
        $table->string('image')->nullable()->after('solde'); // Image facultative
        $table->boolean('verifier')->default(false)->after('image'); // Vérification par défaut à false
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['solde', 'image', 'verifier']);
    });
    }

};
