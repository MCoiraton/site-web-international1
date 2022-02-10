<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
    @include("nav")
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
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
            <div class="swiper intro">
                <div class="swiper-wrapper">
                    <?php
                    $photos=DB::select('select * from assoimage where nom = ? and categorie = ?',[$nom,'intro']);
                    foreach($photos as $photo){
                        $url=$photo->url;
                        echo("<div class=\"swiper-slide\">
                    <img
                      class=\"object-contain w-full h-96\"
                      src=\"$url\"
                      alt=\"image\"
                    />
                  </div>");
                    }
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <h3 class="text-2xl font-semibold">Nos étudiants sur place</h3>
            <p class="mt-4 mb-6">
                <?php
                $temoignages=DB::select('select temoignages from destination where nom = ?',[$nom]);
                echo($temoignages[0]->temoignages);
                ?>
            </p>
            <div class="swiper temoignages">
                <div class="swiper-wrapper">
                    <?php
                    $photos=DB::select('select * from assoimage where nom = ? and categorie = ?',[$nom,'temoignages']);
                    foreach($photos as $photo){
                        $url=$photo->url;
                        echo("<div class=\"swiper-slide\">
                    <img
                      class=\"object-contain w-full h-96\"
                      src=\"$url\"
                      alt=\"image\"
                    />
                  </div>");
                    }
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
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
                <?php
                $cours=DB::select('select * from assocours where nomdestination = ?',[$nom]);
                for($i=0;$i<count($cours);$i++){
                    $semestre=$cours[$i]->semestre;
                    $code=$cours[$i]->code;
                    $titre=$cours[$i]->titre;
                    $nombre=$cours[$i]->nombre;
                    $ects=$cours[$i]->ects;
                    $contenu=$cours[$i]->contenu;
                    echo("<tr class=\"bg-gray-100 border-b border-gray-200\">
                    <td class=\"px-4 py-3\">$semestre</td>
                    <td class=\"px-4 py-3\">$code</td>
                    <td class=\"px-4 py-3\">$titre</td>
                    <td class=\"px-4 py-3\">$ects</td>
                    <td class=\"px-4 py-3\">$nombre</td>
                    <td class=\"px-4 py-3\">$contenu</td>
                </tr>");
                }
                ?>
            </table>
            <h3 class="text-2xl mt-6 font-semibold">Blogs/Presentations réalisés par nos étudiants</h3>
            <?php
                $blogs=DB::select('select * from assoblog where nomdestination = ?',[$nom]);
                for($i=0;$i<count($blogs);$i++){
                    $nomb=$blogs[$i]->nom;
                    $lien=$blogs[$i]->lien;
                    echo("<a href=\"$lien\">
                    <p class=\"mt-4 mb-6 underline\">$nomb</p>
                    </a>");
                }
            ?>
            

            <h3 class="text-2xl mt-6 font-semibold">Documentation, liens utiles.</h3>
            <?php
                $liens=DB::select('select * from assolien where nomdestination = ?',[$nom]);
                for($i=0;$i<count($blogs);$i++){
                    $noml=$liens[$i]->nom;
                    $lien=$liens[$i]->lien;
                    echo("<a href=\"$lien\">
                    <p class=\"mt-4 mb-6 underline\">$noml</p>
                    </a>");
                }
            ?>
            
            <h3 class="text-2xl mt-6 font-semibold">Astuces et informations complémentaires</h3>
            <p class="mt-4 mb-6">
                <?php
                $astucesinfos=DB::select('select astucesinfos from destination where nom = ?',[$nom]);
                echo($astucesinfos[0]->astucesinfos);
                ?>
            </p>
        </article>
    </main>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.intro', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
      var swiper = new Swiper('.temoignages', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
</body>
<footer>
@include("footer")
</footer>
</html>