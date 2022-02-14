<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destination;
use App\Assoblog;
use App\Assolien;
use App\Assoimage;
use App\Assocours;

class DestinationController extends Controller
{
    public function nouvelleDestination(){
        $nom=$_POST["nom"];
        $destination=new Destination();
        $destination->nom=$_POST["nom"];
        $destination->intro=nl2br($_POST["intro"]);
        $destination->temoignages=nl2br($_POST["temoignages"]);
        $destination->astucesinfos=nl2br($_POST["astucesinfos"]);
        $destination->save();
        if(isset($_POST["nomblog"])){
            $nomsblog=$_POST["nomblog"];
            $liensblog=$_POST["lienblog"];
            for($i=0;$i<count($nomsblog);$i++){
                $assoblog=new Assoblog();
                $assoblog->nomdestination=$nom;
                $assoblog->nom=$nomsblog[$i];
                $assoblog->lien=$liensblog[$i];
                $assoblog->save();
            }
        }
        if(isset($_POST["nomlien"])){
            $nomslien=$_POST["nomlien"];
            $lienslien=$_POST["lienlien"];
            for($i=0;$i<count($nomslien);$i++){
                $assolien=new Assolien();
                $assolien->nomdestination=$nom;
                $assolien->nom=$nomslien[$i];
                $assolien->lien=$lienslien[$i];
                $assolien->save();
            }
        }
        if(isset($_POST["semestre"])){
            $semestre=$_POST["semestre"];
            $code=$_POST["code"];
            $titre=$_POST["titre"];
            $ects=$_POST["ects"];
            $nombre=$_POST["nombre"];
            $contenu=$_POST["contenu"];
            for($i=0;$i<count($semestre);$i++){
                $assocours=new Assocours();
                $assocours->nomdestination=$nom;
                $assocours->semestre=$semestre[$i];
                $assocours->code=$code[$i];
                $assocours->titre=$titre[$i];
                $assocours->ects=$ects[$i];
                $assocours->nombre=$nombre[$i];
                $assocours->contenu=nl2br($contenu[$i]);
                $assocours->save();
            }
        }
        $j=0;
        if($_FILES["introphotos"]["name"][0]!=""){
            for($i=0;$i<count($_FILES["introphotos"]["name"]);$i++){
                $info = pathinfo($_FILES["introphotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$j.".$ext; 
                $target = "img/destinations/$nom".$newname;
                move_uploaded_file( $_FILES["introphotos"]["tmp_name"][$i], $target);
                $j++;
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="intro";
                $assoimage->url=$target;
                $assoimage->save();
            }
        }
        if($_FILES["temoignagesphotos"]["name"][0]!=""){
            for($i=0;$i<count($_FILES["temoignagesphotos"]["name"]);$i++){
                $info = pathinfo($_FILES["temoignagesphotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$j.".$ext; 
                $target = "img/destinations/$nom".$newname;
                move_uploaded_file( $_FILES["temoignagesphotos"]["tmp_name"][$i], $target);
                $j++;
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="temoignages";
                $assoimage->url=$target;
                $assoimage->save();
            }
        }
        return view("newdestination");
    }
}
