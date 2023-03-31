<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id();
            $table->date('date_rdv');
            $table->time('temp_dep');
            $table->time('temp_fin');
            $table->string('nom');
            $table->string('prenom');
            $table->string('genre');
            $table->string('num_tel');
            $table->date('date_naissance');
            $table->unsignedBigInteger('id_ser');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rendez_vouses');
    }
};
