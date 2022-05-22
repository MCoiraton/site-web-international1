<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            if($request->file('fichier')->getClientOriginalExtension()!="pdf"){
                return redirect("/profil/fichiers?error=1");
            }
            $uid=session()->get('uid');
            $file = $request->file('fichier')->store("etu/{$uid}");
            $np=session()->get('prenom')." ".session()->get('nom');
            Fichier::create([
                'nom' => $request->nom,
                'uid' => $uid,
                'url' => $file,
                'nomprenom' => $np
            ]);
            return redirect("/profil/fichiers");
        }
        return redirect("/profil/fichiers?e=1");
    }
    public function delete(Request $request){
        $fichier = Fichier::find($request->id);
        Storage::delete($fichier->url);
        $fichier->delete();
        return redirect($request->redirect);
    }
}
