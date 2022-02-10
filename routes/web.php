<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/NouvelleDestination', function () {
    return view('newdestination');
});
Route::post('/NouvelleDestination', function () {
    return view('newdestination');
});
Route::get('/CV', function () {
    return view('generateurcv');
});
Route::get('/Profil', function () {
    return view('profil');
});
Route::get('/GestionDestinations', function () {
    return view('gestiondestinations');
});
Route::post('/GestionDestinations', function () {
    return view('gestiondestinations');
});
Route::get('/auth/login', function(){
    phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
    phpCAS::setNoCasServerValidation();
    if(!phpCAS::checkAuthentication()){
        phpCAS::forceAuthentication();
    }
    $isPolytech=false;
    $myfile = fopen("userlist.txt", "r") or die("Unable to open file!");
    while(!feof($myfile)) {
        $currentUser=fgets($myfile);
        if($currentUser==phpCAS::getAttribute("uid")) $isPolytech=true;
    }
    fclose($myfile);
    session()->put('isPolytech',$isPolytech);
    session()->put('uid',phpCAS::getAttribute("uid"));
    session()->put('prenom',phpCAS::getAttribute("givenname"));
    session()->put('nom',phpCAS::getAttribute("sn"));
    session()->put('mail',phpCAS::getAttribute("mail"));
    $admins=DB::select("select * from admin");
    $isAdmin=false;
    foreach($admins as $admin){
        if($admin->uid==session("uid")) $isAdmin=true;
    }
    session()->put('isAdmin',$isAdmin);
    return redirect('/');
});
Route::get('/auth/logout', function(){
    session()->forget(['uid','nom','prenom','mail']);
    session()->save();
    phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
    phpCAS::logoutWithRedirectService("http://pive-site-web-international.univ-lorraine.fr");
});
$destinations=DB::select('select nom from destination');
foreach($destinations as $destination){
    $destination=$destination->nom;
    Route::get("/$destination", function () {
        return view('destination');
    });
    Route::get("/edit/$destination", function () {
        return view('editdestination');
    });
}


?>