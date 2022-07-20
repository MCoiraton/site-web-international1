<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Index extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->text('description');
            $table->string('titreRubrique1');
            $table->text('paragrapheRubrique1');
            $table->string('lienRubrique1');
            $table->string('titreRubrique2');
            $table->text('paragrapheRubrique2');
            $table->string('lienRubrique2');
            $table->string('titreRubrique3');
            $table->text('paragrapheRubrique3');
            $table->string('lienRubrique3');
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
        //
    }
}
