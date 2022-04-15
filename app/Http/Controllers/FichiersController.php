<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fichier;

class FichiersController extends Controller
{
    public function store(Request $request){
        $uid=session()->get('uid');
        $file = $request->file('fichier')->store("public/{$uid}");
        Fichier::create([
            'nom' => $request->nom,
            'uid' => $uid,
            'url' => $file
        ]);
        return redirect("/profil/fichiers");
    }
}
