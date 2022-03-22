<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Candidature;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;

class FastExcelController extends Controller
{
    public function exportCandidature(Request $request) {
        $candidatures=Candidature::all();
        $border = (new BorderBuilder())
            ->setBorderBottom()
            ->setBorderRight()
            ->setBorderTop()
            ->setBorderLeft()
            ->build();
        $header_style= (new StyleBuilder())
            ->setBackgroundColor("FFFF99")
            ->setCellAlignment(CellAlignment::CENTER)
            ->setBorder($border)
            ->setShouldWrapText()
            ->build();
        $rows_style = (new StyleBuilder())
            ->setCellAlignment(CellAlignment::CENTER)
            ->setBorder($border)
            ->build();


        return (fastexcel($candidatures))
        ->headerStyle($header_style)
        ->rowsStyle($rows_style)
        ->download("fichier_Excel_candidats_mobilité_internationale.xlsx",function ($candidature) {  
            $boursier;
            if($candidature['boursier']==0) $boursier="Non";
            else $boursier="Oui";
            $deja_parti_erasmus;
            if($candidature['deja_parti_erasmus']==0) $deja_parti_erasmus="Non";
            else $deja_parti_erasmus="Oui";
            $langues=$candidature['langue1'].", ".$candidature['langue2'].", ".$candidature['langue3'];
            return [
                    "Nom" => ($candidature['nom']),
                    "Prénom" => ($candidature['prenom']),
                    "Date de naissance" => ($candidature['date_naissance']),
                    "Nationalité" => ($candidature['nationalite']),
                    "E-mail" => $candidature['email'],
                    "Boursier CROUS" => ($boursier),
                    "Région d'origine" => ($candidature['region_origine']),
                    "Année actuelle" => ($candidature['annee_actuelle']),
                    "Diplôme" => ($candidature['diplome_choisi']),
                    "Parcours" => ($candidature['specialisation']),
                    "Langues étudiées" => ($langues),
                    "TOEIC" => ($candidature['toeic']),
                    "Déjà parti en Erasmus" => ($deja_parti_erasmus),
                    "Destination 1" => ($candidature['choix1']),
                    "Durée séjour destination 1" => ($candidature['semestre_choix1']),
                    "Destination 2" => ($candidature['choix2']),
                    "Durée séjour destination 2" => ($candidature['semestre_choix2']),
                    "Destination 3" => ($candidature['choix3']),
                    "Durée séjour destination 3" => ($candidature['semestre_choix3'])
            ];  
        });
    }
}
