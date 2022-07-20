<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $table='candidatures';
    protected $primaryKey='email';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable = [
        'email',
        'id',
        'score',
        'prenom',
        'nom',
        'date_naissance',
        'nationalite',
        'adresse_fixe',
        'code_postal',
        'ville',
        'tel_fixe',
        'portable',
        'boursier',
        'region_origine',
        'annee_entree',
        'annee_actuelle',
        'diplome_choisi',
        'specialisation',
        'langue1',
        'annee_langue1',
        'langue2',
        'annee_langue2',
        'langue3',
        'annee_langue3',
        'toeic',
        'annee_toeic',
        'deja_parti_erasmus',
        'destination_erasmus',
        'date_erasmus',
        'choix1',
        'semestre_choix1',
        'resultat_1',
        'choix2',
        'semestre_choix2',
        'resultat_2',
        'choix3',
        'semestre_choix3',
        'resultat_3',
        'choix4',
        'semestre_choix4',
        'resultat_4',
        'choix5',
        'semestre_choix5',
        'resultat_5',
        'signature'        
    ];
}
