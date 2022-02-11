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
          newdiv.innerHTML="<input name='deleteimg[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      function suppAncienLien(element){
          var newdiv=document.createElement('div');
          newdiv.innerHTML="<input name='deletelien[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      function suppAncienBlog(element){
          var newdiv=document.createElement('div');
          newdiv.innerHTML="<input name='deleteblog[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      nbreCours=-1;
      function newCours(){
        nbreCours+=1;
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-5 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Semestre :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"semestre["+nbreCours+"]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Code :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"code["+nbreCours+"]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Titre</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"titre["+nbreCours+"]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">ECTS</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"ects["+nbreCours+"]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nombre d'échanges</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nombre["+nbreCours+"]\" type=\"text\"/>"+
            "</div></div>"+
            "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Contenu</label>"+
              "<textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"contenu["+nbreCours+"]\" type=\"text\"></textarea>"+
              "</div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppCours(this)\">Supprimer ce cours</button></div>";
          document.getElementById('cours').appendChild(newdiv);
      };
      function suppCours(btn){
        nbreCours-=1;
        btn.parentNode.remove();
      };
      nbreBlog=-1;
      function newBlog(){
        nbreBlog+=1;
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomblog["+nbreBlog+"]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienblog["+nbreBlog+"]\" type=\"text\"/>"+
            "</div></div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppBlog(this)\">Supprimer ce blog</button></div>";
          document.getElementById('blog').appendChild(newdiv);
      };
      function suppBlog(btn){
        nbreBlog-=1;
        btn.parentNode.remove();
      };
      nbreLien=-1;
      function newLien(){
        nbreLien+=1;
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomlien["+nbreLien+"]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienlien["+nbreLien+"]\" type=\"text\"/>"+
            "</div></div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppLien(this)\">Supprimer ce lien</button></div>";
          document.getElementById('lien').appendChild(newdiv);
      };
      function suppLien(btn){
        nbreLien-=1;
        btn.parentNode.remove();
      };
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

          <div id="cours" div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Liste des cours choisis par les étudiants</label>
          <?php
          $courss=DB::select('select * from assocours where nomdestination = ?',[$nom]);
          foreach($courss as $cours){
            echo("<div><div class=\"grid grid-cols-5 mt-5 mx-7\">
          <div class=\"grid grid-cols-1\">
          <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Semestre :</label>
            <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->semestre' name=\"semestre[]\" type=\"text\"/>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Code :</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->code' name=\"code[]\" type=\"text\"/ readonly>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Titre</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->titre' name=\"titre[]\" type=\"text\"/>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">ECTS</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->ects' name=\"ects[]\" type=\"text\"/>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nombre d'échanges</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->nombre' name=\"nombre[]\" type=\"text\"/>
            </div></div>
            <div class=\"grid grid-cols-1 mt-5 mx-7\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Contenu</label>
              <textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"contenu[]\" type=\"text\">$cours->contenu</textarea>
              </div>
            <button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppCours(this)\">Supprimer ce cours</button></div>");
          }
          ?>
          </div>
          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newCours()">Ajouter un cours</button>
          </div>
          <div id="blog" div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Blogs réalisés par les étudiants</label>
            <?php
            $blogs=DB::select('select * from assoblog where nomdestination = ?',[$nom]);
            foreach($blogs as $blog){
              echo("<div><div class=\"grid grid-cols-2 mt-5 mx-7\">
          <div class=\"grid grid-cols-1\">
          <label class=\"md:text-sm text-xs text-gray-500 text-light font-semibold\">NOM : $blog->nom</label>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"md:text-sm text-xs text-gray-500 text-light font-semibold\">LIEN : $blog->lien</label>
            </div></div>
            <button type=\"button\" id=\"$blog->nom\" class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppAncienBlog('$blog->nom')\">Supprimer ce blog</button></div>");
            }
            ?>
          </div>
          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newBlog()">Ajouter un blog</button>
          </div>
          <div id="lien" div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Liens utiles</label>
            <?php
            $liens=DB::select('select * from assolien where nomdestination = ?',[$nom]);
            foreach($liens as $lien){
              echo("<div><div class=\"grid grid-cols-2 mt-5 mx-7\">
          <div class=\"grid grid-cols-1\">
          <label class=\"md:text-sm text-xs text-gray-500 text-light font-semibold\">NOM : $lien->nom</label>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"md:text-sm text-xs text-gray-500 text-light font-semibold\">LIEN : $lien->lien</label>
            </div></div>
            <button type=\"button\" id=\"$lien->nom\" class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppAncienLien('$lien->nom')\">Supprimer ce lien</button></div>");
            }
            ?>
          </div>
          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newLien()">Ajouter un lien</button>
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
if(isset($_POST['deleteimg'])){
    var_dump($_POST['deleteimg']);
}
if(isset($_POST['deleteblog'])){
    var_dump($_POST['deleteblog']);
}
if(isset($_POST['deletelien'])){
    var_dump($_POST['deletelien']);
}
?>