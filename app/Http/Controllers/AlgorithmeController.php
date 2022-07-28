<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Candidature;
use App\Assocours;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use Illuminate\Http\Request;

class AlgorithmeController extends Controller
{
    public function show()
    {
        $listeCandidat = Candidature::all();
        $listeCours = Assocours::all();
        return view('admin-algorithme', ['listeCandidat' => $listeCandidat, 'listeCours' => $listeCours]);
    }

    public function run()
    {
        $candidats = Candidature::all();
        $listeCandidats = array();//création d'un tableau de candidat a manipuler
        foreach($candidats as $cand){
            array_push($listeCandidats,$cand);
        }
        

        foreach ($listeCandidats as $cand) {
            //on récupère les cours choisi
            $choix1 = Assocours::where('code', '=', $cand->choix1)->first();
            $choix2 = Assocours::where('code', '=', $cand->choix2)->first();
            $choix3 = Assocours::where('code', '=', $cand->choix3)->first();
            $choix4 = Assocours::where('code', '=', $cand->choix4)->first();
            $choix5 = Assocours::where('code', '=', $cand->choix5)->first();
            for ($i = 1; $i <= 5; $i++) {
                //la variable inscrits nous permet de récupérer les personnes deja inscrites
                if (empty(${'choix' . $i}->inscrits)) {
                    $inscrits = array();
                    $last = null;
                } else {
                    $inscrits = explode("/", ${'choix' . $i}->inscrits);
                    //on recupere le dernier inscrit, celui dont le score est le plus bas.
                    $last = Candidature::where('id', end($inscrits))->first();
                }

                if (${'choix' . $i} != null && count($inscrits) < ${'choix' . $i}->nombre) {
                    $cand->{'resultat_' . $i} = true;
                   
                    array_push($inscrits, $cand->id);

                    usort($inscrits, function ($a, $b) {        //on trie les inscrits suivant leur score.
                        $ca = Candidature::where('id', $a);
                        $cb = Candidature::where('id', $b);
                        if ($ca->score == $cb->score) {
                            return 0;
                        }
                        return ($ca->score < $cb->score) ? -1 : 1;
                    });         
                    
                    ${'choix' . $i}->inscrits = implode("/", $inscrits);
                    array_diff($listeCandidats, array($cand));
                    ${'choix' . $i}->save();
                    $cand->save();
                    break;
                } elseif (count($inscrits) == ${'choix' . $i}->nombre && $last->score < $cand->score) {

                    $cand->{'resultat_' . $i} = true;
                    
                    array_push($listeCandidats, $last);
                    array_pop($inscrits);
                    array_push($inscrits, $cand->id);

                    usort($inscrits, function ($a, $b) {        //on trie les inscrits suivant leur score.
                        $ca = Candidature::where('id', $a);
                        $cb = Candidature::where('id', $b);
                        if ($ca->score == $cb->score) {
                            return 0;
                        }
                        return ($ca->score < $cb->score) ? -1 : 1;
                    });  

                    array_diff($listeCandidats, array($cand));
                    ${'choix' . $i}->inscrits = implode("/", $inscrits);
                    ${'choix' . $i}->save();
                    $cand->save();
                    break;
                }
                if ($i == 5 || ${'choix' . $i} == null) {
                    //si tout les voeux du candidat n'ont pas de réponse favorable, on le suprime de la liste des candidats
                    $cand->resultat_1=false;
                    $cand->resultat_2=false;
                    $cand->resultat_3=false;
                    $cand->resultat_4=false;
                    $cand->resultat_5=false;
                    $cand->save();
                    array_diff($listeCandidats, array($cand));
                    break;
                }
            }
        }
        return redirect('/admin/algorithme');
    }

    function readExcelFile(Request $request)
    {
        //fonction permettait de récupérer les scores des élèves
        if($request->hasFile('fichier'))
        {
            $column_id="id";
            $column_score="score";
            FastExcel::import( $request->file('fichier'), function ($data) use($column_id,$column_score)
            {
                if(isset($data[$column_score])){
                    $candidat= Candidature::where('id','=',$data[$column_id])->first();
                    $candidat->score=$data[$column_score];

                    $candidat->save();
                }

            });
            return redirect('/admin/algorithme');
        }
        return redirect("/admin/algorithme?error=1");
    }
}
