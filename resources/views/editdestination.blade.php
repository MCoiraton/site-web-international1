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
$nom=explode("/",Route::getCurrentRoute()->uri())[1];
?>
<script>
function afficherMasquer(element){
img=document.getElementById(element);
if(img.style.display=="none") {
    img.style.display ="block";
}
else {
    img.style.display ="none";
}
}
function supprimage(element){
    var newdiv=document.createElement('div');
    newdiv.innerHTML="<input name='delete[]' value='"+element+"' class='hidden'>";
    document.getElementById('suppr').appendChild(newdiv);
    document.getElementById(element).parentNode.remove();
}
</script>
<body>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div id="suppr"></div>
    <div class="flex items-center justify-center  mt-10 mb-10">
        <div class="grid bg-white rounded-lg shadow-xl w-full md:w-11/12 lg:w-1/2">
          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Modification de la page <?php echo($nom); ?></h1>
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Introduction</label>
            <textarea name="intro" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required><?php
                $intro=DB::select('select intro from destination where nom = ?',[$nom]);
                echo(str_replace("<br />","",$intro[0]->intro));
                ?></textarea>
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Images</label>
            <?php
            $photos=DB::select('select * from assoimage where nom = ? and categorie = ?',[$nom,'intro']);
            foreach($photos as $photo){
                $url=$photo->url;
                $photo=explode("/",$photo->url)[2];
                echo("<div class=\"flex space-x-4\"><span class=\"px-3 py-2 text-sm font-medium\">$photo</span>");
                echo("<button onclick=\"afficherMasquer('$photo')\" type=\"button\" class=\"hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium\">Afficher/Masquer</button>");
                echo("<button onclick=\"supprimage('$photo')\" type=\"button\" class=\"items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium\">Supprimer</button>");
                echo("<img id='$photo' style=\"display: none\" class=\"object-contain w-full h-96\" src=\"/$url\"/></div>");
            }
            ?>
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ajouter de nouvelles images</label>
            <input name="introphotos[]" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file" multiple>
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Témoignages</label>
            <textarea name="temoignages" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required><?php
                $temoignages=DB::select('select temoignages from destination where nom = ?',[$nom]);
                echo(str_replace("<br />","",$temoignages[0]->temoignages));
                ?></textarea>
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Images</label>
            <?php
            $photos=DB::select('select * from assoimage where nom = ? and categorie = ?',[$nom,'temoignages']);
            foreach($photos as $photo){
                $url=$photo->url;
                $photo=explode("/",$photo->url)[2];
                echo("<div class=\"flex space-x-4\"><span class=\"px-3 py-2 text-sm font-medium\">$photo</span>");
                echo("<button onclick=\"afficherMasquer('$photo')\" type=\"button\" class=\"hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium\">Afficher/Masquer</button>");
                echo("<button onclick=\"supprimage('$photo')\" type=\"button\" class=\"items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium\">Supprimer</button>");
                echo("<img id='$photo'  style=\"display: none\" class=\"object-contain w-full h-96\" src=\"/$url\"/></div>");
            }
            ?>
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ajouter de nouvelles images</label>
            <input name="temoignagesphotos[]" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file" multiple>
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Astuces et informations complémentaires</label>
            <textarea name="astucesinfos" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required><?php
                $astucesinfos=DB::select('select astucesinfos from destination where nom = ?',[$nom]);
                echo(str_replace("<br />","",$astucesinfos[0]->astucesinfos));
                ?></textarea>
          </div> 


          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="submit">Sauvegarder les modifications</button>
          </div>

        </div>
      </div>
    </form>
</body>
<footer>
@include("footer")
</footer>
</html>
<?php
if(isset($_POST['delete'])){
    var_dump($_POST['delete']);
}
?>