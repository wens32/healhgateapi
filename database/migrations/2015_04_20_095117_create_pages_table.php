<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('namePage')->nullable();
            $table->string('paysPage')->nullable();
            $table->string('villePage')->nullable();
            $table->string('photoPage')->nullable();
            $table->string('telephonePage')->nullable();
            $table->string('emailPage')->unique()->nullable();
            $table->string('adressePage')->nullable();
            $table->string('nomResponsable')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('typePages_id')->constrained('type_pages');
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
        Schema::dropIfExists('pages');
    }
}
