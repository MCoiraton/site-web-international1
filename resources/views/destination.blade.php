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

        <article class="max-w-4xl mx-auto py-8">
            <h1 class="text-3xl font-bold"><?php echo($nom); ?></h1>

            <h3 class="text-2xl font-semibold">Introduction</h3>
            <p class="mt-4 mb-6">
                <?php
                $intro=DB::select('select intro from destination where nom = ?',[$nom]);
                echo($intro[0]->intro);
                ?>
            </p>
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

            <h3 class="text-2xl font-semibold">Nos étudiants sur place</h3>
            <p class="mt-4 mb-6">
                <?php
                $temoignages=DB::select('select temoignages from destination where nom = ?',[$nom]);
                echo($temoignages[0]->temoignages);
                ?>
            </p>
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
                    <th class="px-4 py-3">Nombre d'échanges</th>
                    <th class="px-4 py-3">Contenu</th>
                </tr>
                
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3">1</td>
                    <td class="px-4 py-3">AAAA</td>
                    <td class="px-4 py-3">Cours numero 1</td>
                    <td class="px-4 py-3">5</td>
                    <td class="px-4 py-3">2</td>
                    <td class="px-4 py-3">Chapitre x<br>TD y<br>TP z</td>
                    
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
            <p class="mt-4 mb-6">
                <?php
                $astucesinfos=DB::select('select astucesinfos from destination where nom = ?',[$nom]);
                echo($astucesinfos[0]->astucesinfos);
                ?>
            </p>
        </article>
    </main>
</body>
<footer>
@include("footer")
</footer>
</html>