<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
$nom=explode("/",Route::getCurrentRoute()->uri())[1];
if(isset($_POST['deleteimg'])){
  foreach($_POST['deleteimg'] as $img){
      DB::delete("delete from assoimage where url = ?",[$img]);
      unlink($img); //unlink supprime le fichier du stockage
    }
}
if(isset($_POST['deleteblog'])){
    foreach($_POST['deleteblog'] as $blog){
      DB::delete("delete from assoblog where nom = ?",[$blog]);
    }
}
if(isset($_POST['deletelien'])){
   foreach($_POST['deletelien'] as $lien){
      DB::delete("delete from assolien where nom = ?",[$lien]);
    }
}
if(isset($_POST['deletecours'])){
  foreach($_POST['deletecours'] as $cours){
      DB::delete("delete from assocours where code = ?",[$cours]);
    }
}
if(isset($_POST["nomblog"])){
    $nomsblog=$_POST["nomblog"];
    $liensblog=$_POST["lienblog"];
    for($i=0;$i<count($nomsblog);$i++){
      DB::insert('insert into assoblog (nomdestination,nom,lien) values (?,?,?)',[$nom,$nomsblog[$i],$liensblog[$i]]);
    }
  }
  if(isset($_POST["nomlien"])){
    $nomslien=$_POST["nomlien"];
    $lienslien=$_POST["lienlien"];
    for($i=0;$i<count($nomslien);$i++){
      DB::insert('insert into assolien (nomdestination,nom,lien) values (?,?,?)',[$nom,$nomslien[$i],$lienslien[$i]]);
    }
  }
if(isset($_POST["semestre"])){
    $semestre=$_POST["semestre"];
    $code=$_POST["code"];
    $titre=$_POST["titre"];
    $ects=$_POST["ects"];
    $nombre=$_POST["nombre"];
    $contenu=$_POST["contenu"];
    for($i=0;$i<count($semestre);$i++){
      DB::insert('insert into assocours (nomdestination,semestre,code,titre,ects,nombre,contenu) values (?,?,?,?,?,?,?)',[$nom,$semestre[$i],$code[$i],$titre[$i],$ects[$i],$nombre[$i],nl2br($contenu[$i])]);
    }
  }
  if(isset($_POST["updatesemestre"])){
    $semestre=$_POST["updatesemestre"];
    $code=$_POST["updatecode"];
    $titre=$_POST["updatetitre"];
    $ects=$_POST["updateects"];
    $nombre=$_POST["updatenombre"];
    $contenu=$_POST["updatecontenu"];
    for($i=0;$i<count($semestre);$i++){
      DB::update('update assocours set nomdestination = ?,semestre = ?,titre = ?,ects = ?,nombre =?,contenu = ? where code = ?',[$nom,$semestre[$i],$titre[$i],$ects[$i],$nombre[$i],nl2br($contenu[$i]),$code[$i]]);
    }
  }
  $j=-1;
  $photos=DB::select('select url from assoimage where nom = ?',[$nom]);
  foreach($photos as $photo){
    $photo=explode("/",$photo->url)[2];
    $photo = pathinfo($photo, PATHINFO_FILENAME);
    if($j<substr($photo,strlen($nom))) $j=substr($photo,strlen($nom));
  }
  $j++;
  if(!empty($_FILES)){
    if($_FILES["introphotos"]["name"][0]!=""){
      for($i=0;$i<count($_FILES["introphotos"]["name"]);$i++){
        $info = pathinfo($_FILES["introphotos"]["name"][$i]);
        $ext = $info["extension"];
        $newname = "$j.".$ext; 
        $target = "img/destinations/$nom".$newname;
        move_uploaded_file( $_FILES["introphotos"]["tmp_name"][$i], $target);
        $j++;
        DB::insert('insert into assoimage (nom,categorie,url) values (?,?,?)',[$nom,"intro",$target]);
      }
    }
    if($_FILES["temoignagesphotos"]["name"][0]!=""){
      for($i=0;$i<count($_FILES["temoignagesphotos"]["name"]);$i++){
        $info = pathinfo($_FILES["temoignagesphotos"]["name"][$i]);
        $ext = $info["extension"];
        $newname = "$j.".$ext; 
        $target = "img/destinations/$nom".$newname;
        move_uploaded_file( $_FILES["temoignagesphotos"]["tmp_name"][$i], $target);
        $j++;
        DB::insert('insert into assoimage (nom,categorie,url) values (?,?,?)',[$nom,"temoignages",$target]);
      }
    }
  }
  if(isset($_POST['intro'])){
  $intro=nl2br($_POST['intro']);
  $temoignages=nl2br($_POST['temoignages']);
  $astucesinfos=nl2br($_POST['astucesinfos']);
  DB::update('update destination set intro = ?,temoignages = ?,astucesinfos = ? where nom = ?',[$intro,$temoignages,$astucesinfos,$nom]);
  echo("<head><meta http-equiv=\"refresh\" content=\"0; URL=/edit/$nom\" /></head>"); //permet d eviter d envoyer le formulaire plusieurs fois en rechargeant la page
  }
?>
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
      function suppAncienCours(element){
          var newdiv=document.createElement('div');
          newdiv.innerHTML="<input name='deletecours[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      function newCours(){
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-5 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Semestre :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"semestre[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Code :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"code[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Titre</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"titre[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">ECTS</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"ects[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nombre d'échanges</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nombre[]\" type=\"text\"/>"+
            "</div></div>"+
            "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Contenu</label>"+
              "<textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"contenu[]\" type=\"text\"></textarea>"+
              "</div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppCours(this)\">Supprimer ce cours</button></div>";
          document.getElementById('cours').appendChild(newdiv);
      };
      function suppCours(btn){
        btn.parentNode.remove();
      };
      function newBlog(){
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomblog[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienblog[]\" type=\"text\"/>"+
            "</div></div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppBlog(this)\">Supprimer ce blog</button></div>";
          document.getElementById('blog').appendChild(newdiv);
      };
      function suppBlog(btn){
        btn.parentNode.remove();
      };
      function newLien(){
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomlien[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienlien[]\" type=\"text\"/>"+
            "</div></div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppLien(this)\">Supprimer ce lien</button></div>";
          document.getElementById('lien').appendChild(newdiv);
      };
      function suppLien(btn){
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
                echo("<button onclick=\"afficherMasquer('$url')\" type=\"button\" class=\"hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium\">Afficher/Masquer</button>");
                echo("<button onclick=\"supprimage('$url')\" type=\"button\" class=\"items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium\">Supprimer</button>");
                echo("<img id='$url' style=\"display: none\" class=\"object-contain w-full h-96\" src=\"/$url\"/></div>");
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
                echo("<button onclick=\"afficherMasquer('$url')\" type=\"button\" class=\"hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium\">Afficher/Masquer</button>");
                echo("<button onclick=\"supprimage('$url')\" type=\"button\" class=\"items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium\">Supprimer</button>");
                echo("<img id='$url'  style=\"display: none\" class=\"object-contain w-full h-96\" src=\"/$url\"/></div>");
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
            <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->semestre' name=\"updatesemestre[]\" type=\"text\"/>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Code :</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->code' name=\"updatecode[]\" type=\"text\"/ readonly>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Titre</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->titre' name=\"updatetitre[]\" type=\"text\"/>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">ECTS</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->ects' name=\"updateects[]\" type=\"text\"/>
            </div>
            <div class=\"grid grid-cols-1 ml-1\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nombre d'échanges</label>
              <input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" value='$cours->nombre' name=\"updatenombre[]\" type=\"text\"/>
            </div></div>
            <div class=\"grid grid-cols-1 mt-5 mx-7\">
              <label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Contenu</label>
              <textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"updatecontenu[]\" type=\"text\">$cours->contenu</textarea>
              </div>
            <button type='button' id='$cours->code' class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppAncienCours('$cours->code')\">Supprimer ce cours</button></div>");
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
