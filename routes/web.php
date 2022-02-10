<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;

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
Route::get('/Destinations', function () {
    return view('destinations');
});
Route::get('/CV', function () {
    return view('generateurcv');
});
Route::get('/Profil', function () {
    return view('profil');
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
    return redirect('/');
});
Route::get('/auth/logout', function(){
    session()->forget(['uid','nom','prenom','mail']);
    session()->save();
    phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
    phpCAS::logoutWithRedirectService("http://polytech-international.univ-lorraine.fr:8000");
});

Route::get('/fiche_candidature', [CandidatureController::class, 'show']);

Route::get('/fiche_candidature1', function(){
    return view('fiche_candidature1');
});
