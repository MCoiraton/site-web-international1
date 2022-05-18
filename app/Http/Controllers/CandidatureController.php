<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidature;
use App\VariableGlobal;

class CandidatureController extends Controller
{
    public function show() 
    {
        return view('fiche_candidature');
    }

    public function showAdmin($email) 
    {
        return view('admin-fiche');
    }

    public function store(Request $request) 
    {
        if(Candidature::find(session("mail"))) 
            $candidature = Candidature::find(session("mail"));
        else 
            $candidature = new Candidature();
        if($candidature->blocked!=true) {
            $candidature->email = session("mail");
            $candidature->prenom = $request->prenom;
            $candidature->nom = $request->nom;
            $candidature->date_naissance = $request->date_naissance;
            $candidature->nationalite = $request->nationalite;
            $candidature->adresse_fixe = $request->rue_adresse;
            $candidature->code_postal = $request->code_postal;
            $candidature->ville = $request->ville;
            if($request->tel_fixe) $candidature->tel_fixe = $request->tel_fixe;
            else $candidature->portable = $request->tel_portable;
            if($request->boursier=='Oui') $candidature->boursier = true;
            else $candidature->boursier = false;
            $candidature->region_origine = $request->region_origine;
            $candidature->annee_entree = $request->annee_entree;
            $candidature->annee_actuelle = $request->annee_actuelle;
            $candidature->diplome_choisi = $request->diplome;
            $candidature->specialisation = $request->parcours;
            $candidature->langue1 = $request->langues1;
            $candidature->annee_langue1 = $request->annee_langues1;
            if ($request->langues2) {
                $candidature->langue2 = $request->langues2;
                $candidature->annee_langue2 = $request->annee_langues2;
                if ($request->langues3) {
                    $candidature->langue3 = $request->langues3;
                    $candidature->annee_langue3 = $request->annee_langues3;
                }
            }
            $candidature->toeic = $request->toeic;
            $candidature->annee_toeic = $request->annee_toeic;
            if($request->deja_parti=='Oui') {
                $candidature->deja_parti_erasmus = true;
                $candidature->destination_erasmus = $request->dest_deja_parti;
                $candidature->date_erasmus = $request->date_deja_parti;
            }
            else {
                $candidature->deja_parti_erasmus = false;
                $candidature->destination_erasmus = null;
                $candidature->date_erasmus = null;
            }
            $candidature->choix1 = $request->choix1;
            $candidature->semestre_choix1 = $request->semestre_choix1;
            if($request->choix2) {
                $candidature->choix2 = $request->choix2;
                $candidature->semestre_choix2 = $request->semestre_choix2;
                if($request->choix3) {
                    $candidature->choix3 = $request->choix3;
                    $candidature->semestre_choix3 = $request->semestre_choix3;
                }
            }
            $candidature->date_actuelle = $request->date_signature;
            $candidature->signature = $request->signature;
            $candidature->blocked = true;
            $candidature->demande_unblocked = false;
        }
        else if($candidature->blocked==true) {
            $candidature->demande_unblocked = true;
            $candidature->message_unblocked = $request->message_unblocked;
        }
        $candidature->save();
        return redirect('/profil/candidature');
    }

    public function storeAdmin(Request $request) 
    {
        if(Candidature::find(session("mail"))) 
            $candidature = Candidature::find(session("mail"));
        else 
            $candidature = new Candidature();
        $candidature->email = session("mail");
        $candidature->prenom = $request->prenom;
        $candidature->nom = $request->nom;
        $candidature->date_naissance = $request->date_naissance;
        $candidature->nationalite = $request->nationalite;
        $candidature->adresse_fixe = $request->rue_adresse;
        $candidature->code_postal = $request->code_postal;
        $candidature->ville = $request->ville;
        if($request->tel_fixe) $candidature->tel_fixe = $request->tel_fixe;
        else $candidature->portable = $request->tel_portable;
        if($request->boursier=='Oui') $candidature->boursier = true;
        else $candidature->boursier = false;
        $candidature->region_origine = $request->region_origine;
        $candidature->annee_entree = $request->annee_entree;
        $candidature->annee_actuelle = $request->annee_actuelle;
        $candidature->diplome_choisi = $request->diplome;
        $candidature->specialisation = $request->parcours;
        $candidature->langue1 = $request->langues1;
        $candidature->annee_langue1 = $request->annee_langues1;
        if ($request->langues2) {
            $candidature->langue2 = $request->langues2;
            $candidature->annee_langue2 = $request->annee_langues2;
            if ($request->langues3) {
                $candidature->langue3 = $request->langues3;
                $candidature->annee_langue3 = $request->annee_langues3;
            }
        }
        $candidature->toeic = $request->toeic;
        $candidature->annee_toeic = $request->annee_toeic;
        if($request->deja_parti=='Oui') {
            $candidature->deja_parti_erasmus = true;
            $candidature->destination_erasmus = $request->dest_deja_parti;
            $candidature->date_erasmus = $request->date_deja_parti;
        }
        else {
            $candidature->deja_parti_erasmus = false;
            $candidature->destination_erasmus = null;
            $candidature->date_erasmus = null;
        }
        $candidature->choix1 = $request->choix1;
        $candidature->semestre_choix1 = $request->semestre_choix1;
        if($request->choix2) {
            $candidature->choix2 = $request->choix2;
            $candidature->semestre_choix2 = $request->semestre_choix2;
            if($request->choix3) {
                $candidature->choix3 = $request->choix3;
                $candidature->semestre_choix3 = $request->semestre_choix3;
            }
        }
        $candidature->date_actuelle = $request->date_signature;
        $candidature->signature = $request->signature;
        $candidature->save();
        return view('admin-fiches');
    }

    public function bloquer(Request $request)
    {
        $email = $request->email;
        if(Candidature::find($email)) 
            $candidature = Candidature::find($email);
        else
            abort(404);
        $candidature->blocked = !$candidature->blocked;
        $candidature->demande_unblocked = !$candidature->demande_unblocked;
        $candidature->save();
        return redirect('/admin/fiches');
    }

    public function mail()
    {
        $email = $_POST['email'];
        return redirect('https://mail.etu.univ-lorraine.fr/?view=compose&to=mailto%3A'.$email.'#1');
    }
    
    public function changerdatelimite(Request $request)
    {
        $datelimite=VariableGlobal::find("1");
        if($datelimite==null) $datelimite = new VariableGlobal();
        $datelimite->datelimite_candidature = $request->datelimite;
        $datelimite->save();
        return redirect('/admin/fiches');

    public function deleteAll(Request $request) 
    {
        Candidature::truncate();
        return view('admin-fiches');
    }
}