<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/test', function () {
    return view('testscas');
});
Route::get('/auth/login', function(){
    phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
    phpCAS::setNoCasServerValidation();
    phpCAS::forceAuthentication();
    echo(phpCAS::getUser());
});
Route::get('/auth/logout', [
    'middleware' => 'cas.auth', 
    function(){ 
        cas()->logout(); 
    }
]);


