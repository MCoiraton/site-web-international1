<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Editeur;
use phpCAS;

class AuthController extends Controller
{
    public function login(){
        session()->put('isPolytech', true);
        session()->put('uid',31809214);
        session()->put('prenom',"charle");
        session()->put('nom',"coiraton");
        session()->put('mail',"mathis.coiraton3@etu.univ-lorraine.fr");
        session()->put('isAdmin',true);
        session()->put('isEditeur',true);
       /* phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
        phpCAS::setNoCasServerValidation();
        if(!phpCAS::checkAuthentication()){
            phpCAS::forceAuthentication();
        }
        $isPolytech=false;
        $myfile = fopen("userlist.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $currentUser=trim(fgets($myfile));
            if($currentUser==phpCAS::getAttribute("uid")) $isPolytech=true;
        }
        fclose($myfile);
        session()->put('isPolytech',$isPolytech);
        session()->put('uid',phpCAS::getAttribute("uid"));
        session()->put('prenom',phpCAS::getAttribute("givenname"));
        session()->put('nom',phpCAS::getAttribute("sn"));
        session()->put('mail',phpCAS::getAttribute("mail"));
        $admins=Admin::all();
        $editeurs=Editeur::all();
        $isAdmin=false;
        foreach($admins as $admin){
            if($admin->uid==session("uid")) $isAdmin=true;
        }
        $isEditeur=false;
        foreach($editeurs as $editeur){
            if($editeur->uid==session("uid")) $isEditeur=true;
        }
        session()->put('isAdmin',$isAdmin);
        session()->put('isEditeur',$isEditeur);*/
        return redirect('/');
    }

    public function logout(){
        session()->forget(['uid','nom','prenom','mail','isPolytech','isAdmin','isEditeur']);
        session()->save();
        phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
        phpCAS::logoutWithRedirectService("http://polytech-international.univ-lorraine.fr:8000");
    }
}
