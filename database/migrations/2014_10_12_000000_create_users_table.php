<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nameUser');
            $table->string('emailUser')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('passwordUser');
            $table->string('paysUser')->nullable();
            $table->string('villeUser')->nullable();
            $table->string('photoUser')->nullable();
            $table->string('telephoneUser')->nullable();
            $table->string('niveauUser')->nullable();
            $table->string('experienceUser')->nullable();
            $table->string('lieuExerciceUser')->nullable();
            $table->foreignId('typeUser_id')->constrained('type_users');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
