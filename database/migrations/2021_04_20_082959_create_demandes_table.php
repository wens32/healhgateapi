<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('posteDemande')->nullable();
            $table->string('disponibilite')->nullable();
            $table->string('lieuResidence')->nullable();
            $table->string('validiteDemande')->nullable();
            $table->decimal('renumerationDemande')->nullable();
            $table->string('niveauAcademique')->nullable();
            $table->string('categorieProfessionnelle')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('publication_id')->constrained('publications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
