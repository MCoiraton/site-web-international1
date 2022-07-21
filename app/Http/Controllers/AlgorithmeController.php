<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Candidature;
use App\Destination;
use App\Assocours;

class AlgorithmeController extends Controller {
    public function show(){
        $listeCandidat= Candidature::all();
        $listeCours= Assocours::all();
        return view('admin-algorithme', ['listeCandidat'=>$listeCandidat,'listeCours'=>$listeCours]);
    }
}