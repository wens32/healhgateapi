<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('posteOffre')->nullable();
            $table->string('periodeOffre')->nullable();
            $table->string('experienceOffre')->nullable();
            $table->string('cahierChargeOffre')->nullable();
            $table->decimal('renumerationOffre')->nullable();
            $table->string('lieuExerciceOffre')->nullable();
            $table->string('tempsTravailOffre')->nullable();
            $table->string('niveauRechercherOffre')->nullable();
            $table->foreignId('publication_id')->constrained('publications');
            $table->foreignId('page_id')->constrained('pages');
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
        Schema::dropIfExists('offres');
    }
}
