<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Index;
use App\Assoimage;

class IndexController extends Controller
{
    public function modificationIndex()
    {
        if (isset($_POST['deleteimg'])) {
            foreach ($_POST['deleteimg'] as $img) {
                Assoimage::where('url', $img)->delete();
                unlink(substr($img, 1)); //unlink supprime le fichier du stockage
            }
        }
        $j=0;
        if ($_FILES["herophotos"]["name"][0] != "") {
            for ($i = 0; $i < count($_FILES["herophotos"]["name"]); $i++) {
                $info = pathinfo($_FILES["herophotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$j." . $ext;
                $target0 = "img/hero/" . $newname;
                $target = "/img/hero/" . $newname;
                move_uploaded_file($_FILES["herophotos"]["tmp_name"][$i], $target0);
                $j++;
                $assoimage = new Assoimage();
                $assoimage->nom = 'heroImg';
                $assoimage->categorie = "hero";
                $assoimage->url = $target;
                $assoimage->save();
            }
        }
        return view("admin-index");
    }
    // public function suppr($nom)
    // {
    //     if (isset($_POST['deleteimg'])) {
    //         foreach ($_POST['deleteimg'] as $img) {
    //             Assoimage::where('url', $img)->delete();
    //             unlink(substr($img, 1)); //unlink supprime le fichier du stockage
    //         }
    //     }
    //     $j = -1;
    //     $photos = Assoimage::where('nom', 'heroImg')->get();
    //     foreach ($photos as $photo) {
    //         $photo = explode("/", $photo->url)[2];
    //         $photo = pathinfo($photo, PATHINFO_FILENAME);
    //         if ($j < substr($photo, strlen('heroImg'))) $j = substr($photo, strlen('heroImg'));
    //     }
    //     $j++;
    //     if ($_FILES["herophotos"]["name"][0] != "") {
    //         for ($i = 0; $i < count($_FILES["herophotos"]["name"]); $i++) {
    //             $info = pathinfo($_FILES["herophotos"]["name"][$i]);
    //             $ext = $info["extension"];
    //             $newname = "$j." . $ext;
    //             $target = "img/hero/$nom" . $newname;
    //             move_uploaded_file($_FILES["herophotos"]["tmp_name"][$i], $target);
    //             $j++;
    //             $assoimage = new Assoimage();
    //             $assoimage->nom = $nom;
    //             $assoimage->categorie = "hero";
    //             $assoimage->url = $target;
    //             $assoimage->save();
    //         }
    //     }
    //     return redirect("/admin/index/");
    // }

    public function affichageEdition($nom)
    {
        $currentIndex = Index::all();
        $photos = Assoimage::where('nom', 'heroImg')->get();
        return view('admin-index', ['currentIndex' => $currentIndex]);
    }
    public function affichageIndex($nom)
    {
        $currentIndex = Index::latest()->get();
        $photos = Assoimage::where('nom', 'heroImg')->get();
        return view('index', ['currentIndex' => $currentIndex]);
    }
}
