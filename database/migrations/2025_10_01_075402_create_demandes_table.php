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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            //
            $table->string("type_demande");
            $table->string("me");
            $table->string("lastname");
            $table->string("firstname");
            $table->string("email");
            $table->string("city");
            $table->string("code_postal");
            $table->string("type_bien");
            $table->string("price_max")->nullable();
            $table->integer("room")->nullable();
            $table->string("surface")->nullable();
            $table->integer("salle_bain")->nullable();
            $table->string("description")->nullable();
            $table->boolean("is_allow")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
