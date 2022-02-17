<?php

use App\Http\Controllers\AuthController;
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

Route::get('/admin/creation', function () {
return view('admin-creation');
})->middleware('admin');

Route::post('admin-creation', 'DestinationController@nouvelleDestination')->middleware('admin');
Route::post('/admin/creation', 'DestinationController@suppDestination')->middleware('admin');
Route::post('/admin/modification', 'DestinationController@editDestination')->middleware('admin');

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/admin/gestion', function () {
    return view('admin-gestion');
})->middleware('admin');

Route::get("/admin-modification/{nom}", "DestinationController@affichageEdition")->middleware('admin');
Route::post("/admin-modification/{nom}",['as' => 'editDestination', 'uses' => 'DestinationController@editDestination'])->middleware('admin');

Route::get('/CV', function () {
    return view('generateurcv');
}); 

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/auth/login', "AuthController@login");
Route::get('/auth/logout', "AuthController@logout");

Route::get('/destinations', 'DestinationController@affichageDestinations');
Route::get("/destination/{nom}", "DestinationController@affichageDestination");

Route::get('/fiche_candidature', [CandidatureController::class, 'show'])->name('fiche_candidature.show');
Route::post('/fiche_candidature', [CandidatureController::class, 'store'])->name('fiche_candidature.store');

?>
