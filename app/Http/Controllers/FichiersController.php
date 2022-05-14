<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fichier;

class FichiersController extends Controller
{
    public function show(){
        $fichiers = Fichier::all()->where('uid', '=', session('uid'));
        return view('profil-fichiers', ['fichiers' => $fichiers]);
    }
    public function showadmin(){
        $fichiers = Fichier::all()->groupBy('uid');
        return view('admin-fichiers', ['fichiers' => $fichiers]);
    }
    public function store(Request $request){
        if($request->hasFile('fichier') && $request->nom!=""){
            $uid=session()->get('uid');
            $file = $request->file('fichier')->store("public/{$uid}");
            $file = str_replace("public", 'storage', $file);
            Fichier::create([
                'nom' => $request->nom,
                'uid' => $uid,
                'url' => $file
            ]);
            return redirect("/profil/fichiers");
        }
        return redirect("/profil/fichiers?e=1");
    }
    public function delete(Request $request){
        $fichier = Fichier::find($request->id);
        $file=$fichier->url;
        unlink($file);
        $fichier->delete();
        return redirect($request->redirect);
    }
}
