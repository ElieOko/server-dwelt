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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            // $table->json('piece')->nullable(); // stocker les pièces [{nom,nombre}]
            $table->json('caracteristique')->nullable(); // [{nom}]
            $table->string('measure')->nullable();
            $table->unsignedBigInteger('agentId')->nullable();
            $table->unsignedBigInteger('cityId')->nullable();
            $table->unsignedBigInteger('communeId')->nullable();
            $table->unsignedBigInteger('propertyTypeId')->nullable();
            $table->unsignedBigInteger('statusPropertyId')->nullable();
            $table->boolean('isDisponible')->nullable()->default(true);
            $table->string('superficie')->nullable();
            $table->decimal('prix', 15, 2);
            $table->string('partPayed')->nullable();
            $table->unsignedBigInteger('countryId');
            $table->string('codePostal')->nullable();
            $table->integer('salleBain')->nullable();
            $table->integer('cuisine')->nullable();
            $table->integer('garage')->nullable();
            $table->integer('chambre')->nullable();
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
