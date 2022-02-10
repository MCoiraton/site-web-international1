<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
    @include("nav")
</head>
<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
$nom=Route::getCurrentRoute()->uri();
?>
<body>
    <main class="relative container mx-auto bg-white px-4">

        <div id="main_image_blur" class="relative -mx-4 top-0 pt-[17%] overflow-hidden">
            <img class="absolute inset-0 z-0 object-cover object-top w-full h-full filter blur" src="../../img/glasgow.jpeg" alt="" />
        </div>

        <div id="main_image" class="mt-[-10%] w-1/2 mx-auto">
            <div class="relative pt-[56.25%] overflow-hidden rounded-2xl">
            <img class="w-full h-full absolute inset-0 object-cover" src="../../img/glasgow.jpeg" alt="" />
            </div>
        </div>

        <article class="max-w-prose mx-auto py-8">
            <h1 class="text-3xl font-bold">Nom Complet de l'Université.</h1>
            <h2 class="mt-2 text-sm text-gray-500 mb-2">Lien web.</h2>

            <h3 class="text-2xl font-semibold">Introduction</h3>
            <p class="mt-4 mb-6">Introduction et courte présentation de l'université avec photos</p>
            <div class="flex flex-col items-center">
                <div class="flex flex-col items-center">
                    <div class="swiper flex overflow-x-scroll w-5/6">
                        <img class="w-full bg-cover h-full object-cover bg-gray-300" src="../../img/prague1.jpeg" id="slide1">
                        <img class="w-full bg-cover h-full object-cover bg-gray-300" src="../../img/prague3.jpeg" id="slide2">
                    </div>
                </div>
                <div class="flex mt-4">
                    <a href="#slide1" class="w-3 h-3 mx-1 bg-gray-300 rounded-full"></a>
                    <a href="#slide2" class="w-3 h-3 mx-1 bg-gray-300 rounded-full"></a>
                </div>
            </div>

            <h3 class="text-2xl font-semibold">Our students at the university:</h3>
            <p class="mt-4 mb-6">Retour des expériences des étudiants de Polytech Nancy dans cette université.(Avec photos)</p>
            <div class="flex flex-col items-center">
                <div class="flex flex-col items-center">
                    <div class="swiper flex overflow-x-scroll w-5/6">
                        <img class="w-full bg-cover h-full object-cover bg-gray-300" src="../../img/prague1.jpeg" id="slide1">
                        <img class="w-full bg-cover h-full object-cover bg-gray-300" src="../../img/prague3.jpeg" id="slide2">
                    </div>
                </div>
                <div class="flex mt-4">
                    <a href="#slide1" class="w-3 h-3 mx-1 bg-gray-300 rounded-full"></a>
                    <a href="#slide2" class="w-3 h-3 mx-1 bg-gray-300 rounded-full"></a>
                </div>
            </div>

            <h3 class="text-2xl mt-6 font-semibold">Liste des cours</h3>
            <p class="mt-4 mb-6">Tableau récapitulatif des cours par filières.</p>
            <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3">Semstre</th>
                    <th class="px-4 py-3">Code</th>
                    <th class="px-4 py-3">Titre Cours</th>
                    <th class="px-4 py-3">ECTS</th>
                    <th class="px-4 py-3">Contenu</th>
                    <th class="px-4 py-3">Nombre d'échanges</th>
                </tr>
                
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3">1</td>
                    <td class="px-4 py-3">AAAA</td>
                    <td class="px-4 py-3">Cours numero 1</td>
                    <td class="px-4 py-3">5</td>
                    <td class="px-4 py-3">Chapitre x<br>TD y<br>TP z</td>
                    <td class="px-4 py-3">2</td>
                </tr>
            </table>

            <h3 class="text-2xl mt-6 font-semibold">Blogs/Presentations réalisés par nos étudiants</h3>
            <a href="#">
                <p class="mt-4 mb-6 underline">Telecharger Blog étudiant n°1</p>
            </a>

            <h3 class="text-2xl mt-6 font-semibold">Documentation, liens utiles.</h3>
            <a href="#">
                <p class="mt-4 mb-6 underline">Doc utile.</p>
            </a>
            
            <h3 class="text-2xl mt-6 font-semibold">Astuces et informations complémentaires</h3>
            <p class="mt-4 mb-6">Informations...</p>
        </article>
    </main>
</body>
<footer>
@include("footer")
</footer>
</html>