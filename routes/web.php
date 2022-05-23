<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FichiersController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FastExcelController;

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

Route::get('/', [IndexController::class,'affichageIndex']);

Route::get('/admin/creation', function () {
    return view('admin-creation');
})->middleware('admin');
Route::post('admin/creation', [DestinationController::class,'nouvelleDestination'])->middleware('admin');
Route::delete('/admin/suppression', [DestinationController::class,'suppDestination'])->middleware('admin');
Route::post('/admin/modification', [DestinationController::class,'editDestination'])->middleware('admin');

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/admin/gestion', function () {
    return view('admin-gestion');
})->middleware('admin');

Route::get('/admin/fiches', function () {
    return view('admin-fiches');
})->middleware('admin');


Route::get('/admin/utilisateurs', [UserController::class,'liste'])->middleware('admin');
Route::post('/admin/utilisateurs/delete', [UserController::class,'delete'])->middleware('admin')->name('deleteadmin');
Route::post('/admin/utilisateurs/add', [UserController::class,'add'])->middleware('admin')->name('addadmin');

Route::get('/admin/fichiers', [FichiersController::class, 'showadmin'])->middleware('admin');

Route::get('/storage/etu/{uid}/{filename}', function ($uid,$filename) {
    $file = Storage::disk('local')->get('etu/'.$uid.'/'.$filename);
    return response($file, 200)->header('Content-Type', 'application/pdf');
})->middleware('filesecu:{uid}');
Route::get('storage/blogs/{blog}', function ($blog) {
    $file = Storage::disk('local')->get('blogs/'.$blog);
    return response($file, 200)->header('Content-Type', 'application/pdf');
});

Route::get('/admin/fiches/annee/{annee?}', function (int $annee = null) {
    return view('admin-fiches', [
        'annee' => $annee
    ]);
})->middleware('admin');

Route::get('/admin/accueil/', [IndexController::class,'affichageIndMod'])->middleware('admin');
Route::post('/admin/accueil/', [IndexController::class,'saveIndex'])->middleware('admin');

Route::get('/admin/blogs', [BlogsController::class,'affichage'])->middleware('admin');
Route::post('/admin/blogs', [BlogsController::class,'addBlog'])->middleware('admin');
Route::delete('/admin/blogs', [BlogsController::class,'deleteBlog'])->middleware('admin');

Route::post('/admin/fiches/changerdatelimite', [CandidatureController::class,'changerdatelimite'])->middleware('admin');
Route::post('/admin/fiches/exportExcel', [FastExcelController::class,'exportCandidature'])->middleware('admin');
Route::post('/admin/fiches/block', [CandidatureController::class,'bloquer'])->middleware('admin');
Route::post('/admin/fiches/mail', [CandidatureController::class,'mail'])->middleware('admin');
Route::delete('/admin/fiches', [CandidatureController::class,'deleteAll'])->middleware('admin');
Route::get("/admin/fiche/{email}", [CandidatureController::class,"showAdmin"])->middleware('admin');
Route::post('/admin/fiche', [CandidatureController::class,"storeAdmin"])->name('fiche_candidature.storeAdmin')->middleware('admin');
Route::get('/admin/articles', [ArticlesController::class, 'showListe'])->middleware('admin');
Route::get('/admin/nouvelarticle', function(){
    return view('admin-article');
})->middleware('admin');
Route::post('/admin/nouvelarticle', [ArticlesController::class, 'store'])->middleware('admin');
Route::get('/admin/article/{id}', [ArticlesController::class, 'showEdit'])->middleware('admin');
Route::post('/admin/article/{id}', [ArticlesController::class, 'store'])->middleware('admin');
Route::delete('/admin/article/{id}', [ArticlesController::class, 'delete'])->middleware('admin');
Route::post('/admin/msgaccueil', [IndexController::class, 'savemsgaccueil'])->middleware('admin');
Route::delete('/admin/msgaccueil', [IndexController::class, 'removemsgaccueil'])->middleware('admin');

Route::get("/admin/modification/{nom}", [DestinationController::class,"affichageEdition"])->middleware('admin');
Route::post("/admin/modification/{nom}", [DestinationController::class,'editDestination'])->middleware('admin');

Route::get("/articles", [ArticlesController::class, "showListe2"]);
Route::get("/article/{id}", [ArticlesController::class, "show"]);

Route::get('/profil', function () {
    return view('profil');
})->middleware('polytech');

Route::get('/profil/candidature', function () {
    return view('profil-candidature');
})->middleware('polytech');

Route::post('/profil/candidature', [CandidatureController::class, 'store'])->name('fiche_candidature.store')->middleware('polytech');
Route::post('/profil/fichiers/store', [FichiersController::class, 'store'])->name('fichier.store')->middleware('polytech');
Route::post('/profil/fichiers/delete', [FichiersController::class, 'delete'])->name('fichier.delete')->middleware('polytech');

Route::get('/profil/cv', function () {
    return view('profil-cv');
})->middleware('polytech');
Route::get('/profil/fichiers', [FichiersController::class, 'show'])->middleware('polytech');

Route::get('/auth/login', [AuthController::class,"login"]);
Route::get('/auth/logout', [AuthController::class,"logout"]);

Route::get('/destinations', [DestinationController::class,'affichageDestinations']);
Route::get("/destination/{nom}", [DestinationController::class,"affichageDestination"]);
