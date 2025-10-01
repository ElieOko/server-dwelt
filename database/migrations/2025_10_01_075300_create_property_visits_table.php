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
        Schema::create('property_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maison_id');
            $table->string('type_visite');   // Achat, Location, etc.
            $table->string('date');            // Date de la visite
            $table->string('heure');           // Heure de la visite
            $table->string('nom_complet');   // Nom complet du demandeur
            $table->string('telephone');     // Numéro de téléphone
            $table->text('message')->nullable(); // Message optionnel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_visits');
    }
};
