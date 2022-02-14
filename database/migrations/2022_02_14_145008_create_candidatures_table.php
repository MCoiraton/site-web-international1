<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->date('date_naissance');
            $table->string('nationalite');
            $table->string('adresse_fixe');
            $table->integer('code_postal');
            $table->string('ville');
            $table->integer('tel_fixe');
            $table->integer('portable');
            $table->string('email');
            $table->boolean('boursier');
            $table->string('region_origine');
            $table->string('annee_entree');
            $table->string('annee_actuelle');
            $table->string('diplome_choisi');
            $table->string('specialisation');
            $table->string('langue1');
            $table->integer('annee_langue1');
            $table->string('langue2');
            $table->integer('annee_langue2');
            $table->string('langue3');
            $table->integer('annee_langue3');
            $table->integer('toeic');
            $table->integer('annee_toeic');
            $table->boolean('deja_parti_erasmus');
            $table->string('destination_erasmus');
            $table->date('date_erasmus');
            $table->string('choix1');
            $table->string('semestre_choix1');
            $table->string('choix2');
            $table->string('semestre_choix2');
            $table->string('choix3');
            $table->string('semestre_choix3');
            $table->date('date_actuelle');
            $table->string('signature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatures');
    }
}
