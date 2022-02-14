<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidature;

class CandidatureController extends Controller
{
    public function show() 
    {
        return view('fiche_candidature');
    }

    public function store(Request $request) 
    {
        Candidature::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'date_naissance' => $request->date_naissance,
            'nationalite' => $request->nationalite,
            'adresse_fixe' => $request->rue_adresse,
            'code_postal' => $request->code_postal,
            'ville' => $request->ville,
            'tel_fixe' => $request->tel_fixe,
            'portable' => $request->tel_portable,
            'boursier' => $request->boursier,
            'region_origine' => $request->region_origine,
            'annee_entree' => $request->annee_entree,
            'annee_actuelle' => $request->annee_actuelle,
            'diplome_choisi' => $request->diplome,
            'specialisation' => $request->parcours,
            'langue1' => $request->langues1,
            'annee_langue1' => $request->annee_langues1,
            'langue2' => $request->langues2,
            'annee_langue2' => $request->annee_langues2,
            'langue3' => $request->langues3,
            'annee_langue3' => $request->annee_langues3,
            'toeic' => $request->toeic,
            'annee_toeic' => $request->annee_toeic,
            'deja_parti_erasmus' => $request->deja_parti,
            'destination_erasmus' => $request->dest_date_deja_parti,
            'date_erasmus' => $request->date_deja_parti,
            'choix1' => $request->choix1,
            'semestre_choix1' => $request->semestre_choix1,
            'choix2' => $request->choix2,
            'semestre_choix2' => $request->semestre_choix2,
            'choix3' => $request->choix3,
            'semestre_choix3' => $request->semestre_choix3,
            'date_actuelle' => $request->date_signature,
            'signature' => $request->signature
        ]);
    }
}