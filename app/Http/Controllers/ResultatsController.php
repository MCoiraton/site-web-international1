<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Candidature;

class ResultatsController extends Controller {
    public function show(){
        $candidature = Candidature::find(session("mail"));
        if($candidature->resultat_1==true){
            $resultat=$candidature->choix1;
            $position=1;
        }elseif($candidature->resultat_2==true){
            $resultat=$candidature->choix2;
            $position=2;
        }elseif($candidature->resultat_3==true){
            $resultat=$candidature->choix3;
            $position=3;
        }elseif($candidature->resultat_4==true){
            $resultat=$candidature->choix4;
            $position=4;
        }elseif($candidature->resultat_5==true){
            $resultat=$candidature->choix5;
            $position=5;
        }else{
            $resultat=null;
            $position=null;
        }
        return view('profil-resultats', ['resultat'=>$resultat,'position'=>$position]);
    }
}