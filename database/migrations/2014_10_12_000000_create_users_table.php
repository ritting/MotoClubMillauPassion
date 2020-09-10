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
            $table->string('name');
            $table->boolean('name_v')->nullable();
            $table->string('email')->unique();
            $table->boolean('email_v')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->boolean('adresse_v')->nullable();
            $table->string('telephone')->nullable();
            $table->boolean('telephone_v')->nullable();
            $table->string('chemin_photo')->nullable();
            $table->boolean('photo_v')->default(0);
            $table->date('date_de_naissance')->nullable();
            $table->boolean('date_de_naissance_v')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('admin')->default(0);
            $table->boolean('verifie')->default(0);
            $table->string('password');
            $table->string('ville_natale')->nullable();
            $table->enum('categorie', ['< 50', '= 125', '> 125'])->nullable();
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
