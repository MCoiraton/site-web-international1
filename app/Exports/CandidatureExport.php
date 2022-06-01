<?php

namespace App\Exports;

use App\Candidature;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidatureExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $candidatures=Candidature::all();
        $champs_ajout = Schema::getColumnListing('candidatures_ajout');
        $ajouts=DB::select("SELECT * FROM candidatures_ajout");
        for($i=0;$i<count($champs_ajout);$i++) {
            for($j=0;$j<count($candidatures);$j++) {
                if(count($champs_ajout)>1) {
                    $candidatures[$j]->{$champs_ajout[$i]}=$ajouts[$j]->{$champs_ajout[$i]};
                }
                unset($candidatures[$j]->created_at);
                unset($candidatures[$j]->updated_at);
                unset($candidatures[$j]->blocked);
                unset($candidatures[$j]->demande_unblocked);
                unset($candidatures[$j]->message_unblocked);
                $signature=$candidatures[$j]->signature;
                unset($candidatures[$j]->signature);
                $candidatures[$j]->signature=$signature;
            }
        }
        return $candidatures;
    }
    public function headings(): array
    {
        $array= [
            'Email',
            'Nom',
            'Prenom',
            'Date de naissance',
            'Nationalité',
            'Adresse',
            'Code postal',
            'Ville',
            'Téléphone fixe',
            'Téléphone portable',
            'Boursier CROUS',
            'Région d\'origine',
            'Année entrée',
            'Année actuelle',
            'Diplôme',
            'Parcours',
            'Langue 1',
            'Année d\'études 1',
            'Langue 2',
            'Année d\'études 2',
            'Langue 3',
            'Année d\'études 3',
            'Score Toeic',
            'Année Toeic',
            'Deja parti Erasmus',
            'Destination Erasmus',
            'Date Erasmus',
            'Choix 1',
            'Semestre choix 1',
            'Choix 2',
            'Semestre choix 2',
            'Choix 3',
            'Semestre choix 3'
        ];
        $champs_ajout = Schema::getColumnListing('candidatures_ajout');
        foreach($champs_ajout as $champ){
            if($champ!='email'){
                array_push($array,str_replace('_',' ',$champ));
            }
        }
        array_push($array,'Signature');
        return $array;
    }
}
