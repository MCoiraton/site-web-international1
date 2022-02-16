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
    function choixtelportable(){
        document.getElementsByName("tel_fixe")[0].required=false;
    }
    function annee_entree_1A() {
        document.getElementById("annee_actuelle_2A").disabled=false;
        document.getElementById("annee_actuelle_3A").disabled=false;
        document.getElementById("annee_actuelle_4A").disabled=false;
    }
    function annee_entree_2A() {
        document.getElementById("annee_actuelle_2A").disabled=false;
        document.getElementById("annee_actuelle_3A").disabled=false;
        document.getElementById("annee_actuelle_4A").disabled=false;
    }
    function annee_entree_3A() {
        document.getElementById("annee_actuelle_2A").disabled=true;
        document.getElementById("annee_actuelle_3A").disabled=false;
        document.getElementById("annee_actuelle_4A").disabled=false;
    }
    function annee_entree_4A() {
        document.getElementById("annee_actuelle_2A").disabled=true;
        document.getElementById("annee_actuelle_3A").disabled=true;
        document.getElementById("annee_actuelle_4A").disabled=false;
    }
    function choixEMME(){
        document.getElementById("SIR").disabled=true;
        document.getElementById("SIA").disabled=true;
        document.getElementById("MCL").disabled=true;
        document.getElementById("MSS").disabled=true;
        document.getElementById("MFE").disabled=false;
        document.getElementById("MSM").disabled=false;
        document.getElementById("IE").disabled=false;
    }
    function choixIA2R(){
        document.getElementById("SIR").disabled=false;
        document.getElementById("SIA").disabled=false;
        document.getElementById("MFE").disabled=true;
        document.getElementById("MSM").disabled=true;
        document.getElementById("IE").disabled=true;
        document.getElementById("MCL").disabled=true;
        document.getElementById("MSS").disabled=true;
    }
    function choixM3(){
        document.getElementById("MCL").disabled=false;
        document.getElementById("MSS").disabled=false;
        document.getElementById("MFE").disabled=true;
        document.getElementById("MSM").disabled=true;
        document.getElementById("IE").disabled=true;
        document.getElementById("SIR").disabled=true;
        document.getElementById("SIA").disabled=true;
    }
    function deja_parti_erasmus_oui() {
        document.getElementsByName("dest_deja_parti")[0].disabled=false;
        document.getElementsByName("date_deja_parti")[0].disabled=false;
        document.getElementsByName("dest_deja_parti")[0].required=true;
        document.getElementsByName("date_deja_parti")[0].required=true;
    }
    function deja_parti_erasmus_non() {
        document.getElementsByName("dest_deja_parti")[0].required=false;
        document.getElementsByName("date_deja_parti")[0].required=false;
        document.getElementsByName("dest_deja_parti")[0].disabled=true;
        document.getElementsByName("date_deja_parti")[0].disabled=true;
    }
</script>
<body>
    <h1> Fiche candidature à un échange international </h1>
    <form action="{{ route('fiche_candidature.store') }}" method="post">
        @csrf
        <p><label for="prenom">Prénom</label>
        <input type="text" name="prenom" required class="border-black-600 border-2"> </p>
        <p><label for="nom">Nom</label>
        <input type="text" name="nom" required class="border-black-600 border-2"> </p>
        <p><label for="date_naissance">Date de naissance</label>
        <input type="date" name="date_naissance" required class="border-black-600 border-2"> </p>
        <p><label for="nationalite">Nationalité</label>
        <input type="text" name="nationalite" required class="border-black-600 border-2"> </p>
        <p><label for="rue_adresse">Adresse fixe</label>
        <input type="text" name="rue_adresse" required class="border-black-600 border-2"></p>
        <p><label for="code_postal">Code Postal</label>
        <input type="number" name="code_postal" required class="border-black-600 border-2"></p>
        <p><label for="ville">Ville</label>
        <input type="text" name="ville" required class="border-black-600 border-2"></p>
        <p><label for="tel_fixe">Tél fixe</label>
        <input type="tel" name="tel_fixe" required class="border-black-600 border-2"></p>
        <p><label for="tel_portable">Portable</label>
        <input type="tel" name="tel_portable" onchange="choixtelportable()" class="border-black-600 border-2"></p>
        <p><label for="mail">E-mail</label>
        <input type="mail" name="mail" required class="border-black-600 border-2"></p>
        <p><label for="boursier">Boursier national : </label>
            <label for="Oui">Oui (échelon 0 inclus)</label>
            <input type="radio" name="boursier" value="Oui" class="border-black-600 border-2">
            <label for="Non">Non</label>
            <input type="radio" name="boursier" value="Non" class="border-black-600 border-2"></p>
        <p><label for="region_origine">Région d'origine</label>
        <input type="text" name="region_origine" required class="border-black-600 border-2"></p>
        
        <h2>Informations scolarité</h2>
        <p><label for="annee_entree">Entrée à Polytech Nancy en :</label>
            <label for="1A">1A</label>
            <input type="radio" name="annee_entree" onchange="annee_entree_1A()" value="1A" class="border-black-600 border-2">
            <label for="2A">2A</label>
            <input type="radio" name="annee_entree" onchange="annee_entree_2A()" value="2A" class="border-black-600 border-2">
            <label for="3A">3A</label>
            <input type="radio" name="annee_entree" onchange="annee_entree_3A()" value="3A" class="border-black-600 border-2">
            <label for="4A">4A</label>
            <input type="radio" name="annee_entree" onchange="annee_entree_4A()" value="4A" class="border-black-600 border-2"></p>
        <p><label for="annee_actuelle">Année scolaire actuelle :</label>
            <label for="2A">2A</label>
            <input type="radio" name="annee_actuelle" id="annee_actuelle_2A" value="2A" class="border-black-600 border-2">
            <label for="3A">3A</label>
            <input type="radio" name="annee_actuelle" id="annee_actuelle_3A" value="3A" class="border-black-600 border-2">
            <label for="4A">4A</label>
            <input type="radio" name="annee_actuelle" id="annee_actuelle_4A" value="4A" class="border-black-600 border-2"></p>
        <p><label for="diplome">Diplôme choisi :</label>
            <label for="EMME">EMME</label>
            <input type="radio" name="diplome" onchange="choixEMME()" value="EMME" class="border-black-600 border-2">
                <label for="MFE">MFE</label>
                <input type="radio" name="parcours" id="MFE" value="MFE" class="border-black-600 border-2">
                <label for="MSM">MSM</label>
                <input type="radio" name="parcours" id="MSM" value="MSM" class="border-black-600 border-2">
                <label for="IE">IE</label>
                <input type="radio" name="parcours" id="IE" value="IE" class="border-black-600 border-2">
            <p><label for="diplome">IA2R</label>
            <input type="radio" name="diplome" onchange="choixIA2R()" value="IA2R" class="border-black-600 border-2">
                <label for="SIR">SIR</label>
                <input type="radio" name="parcours" id="SIR" value="SIR" class="border-black-600 border-2">
                <label for="SIA">SIA</label>
                <input type="radio" name="parcours" id="SIA" value="SIA" class="border-black-600 border-2">
            </p>
            <p><label for="diplome">M3</label>
            <input type="radio" name="diplome" onchange="choixM3()" value="M3" class="border-black-600 border-2">
                <label for="MSS">MSS</label>
                <input type="radio" name="parcours" id="MSS" value="MSS" class="border-black-600 border-2">
                <label for="MCL">MCL</label>
                <input type="radio" name="parcours" id="MCL" value="MCL" class="border-black-600 border-2">
            </p>
        </p>
        <p><label for="langues">Langues étrangères :</label>
        <p><input type="text" name="langues1" required class="border-black-600 border-2">
        <label for="annee_langues1">Nbre d'années d'études :</label>
        <input type="number" name="annee_langues1" required class="border-black-600 border-2"></p>
        <p><input type="text" name="langues2" class="border-black-600 border-2">
        <label for="annee_langues2">Nbre d'années d'études :</label>
        <input type="number" name="annee_langues2" class="border-black-600 border-2"></p>
        <p><input type="text" name="langues3" class="border-black-600 border-2">
        <label for="annee_langues3">Nbre d'années d'études :</label>
        <input type="number" name="annee_langues3" class="border-black-600 border-2"></p>
        </p>
        <p><label for="toeic">Score TOEIC :</label>
        <input type="number" name="toeic" required class="border-black-600 border-2">
        <label for="annee_toeic">Année :</label>
        <input type="number" name="annee_toeic" required class="border-black-600 border-2">
        </p>
        <p><label for="deja_parti">Êtes-vous déjà parti en échange ERASMUS :</label>
            <label for="Oui">Oui</label>
            <input type="radio" name="deja_parti" onchange="deja_parti_erasmus_oui()" value="Oui" class="border-black-600 border-2">
            <label for="Non">Non</label>
            <input type="radio" name="deja_parti" onchange="deja_parti_erasmus_non()" value="Non" class="border-black-600 border-2"></p>
        <p><label for="dest_date_deja_parti">Si oui, destination et dates du séjour:</label>
        <input type="text" name="dest_deja_parti" class="border-black-600 border-2">
        <input type="date" name="date_deja_parti" class="border-black-600 border-2"></p>

        <p><h2>Indiquez par ordre de préférence 3 destinations*</h2></p>
        <p>*Liste disponible sur le Site Web de Polytech Nancy, menu "INTERNATIONAL", "Etudes à l’étranger", et dans l’Intranet
            de Polytech Nancy menu "9. International"</p>
        <p><label for="choix1">Choix 1 :</label>
            <input type="text" name="choix1" required class="border-black-600 border-2">
            <label for="S5">S5</label>
            <input type="radio" name="semestre_choix1" id="choix1_S5" value="S5" class="border-black-600 border-2">
            <label for="S7">S7</label>
            <input type="radio" name="semestre_choix1" id="choix1_S7" value="S7" class="border-black-600 border-2">
            <label for="S9">S9</label>
            <input type="radio" name="semestre_choix1" id="choix1_S9" value="S9" class="border-black-600 border-2">
            <label for="S5+6">S5+6</label>
            <input type="radio" name="semestre_choix1" id="choix1_S5S6" value="S5+6" class="border-black-600 border-2">
            <label for="S7+8">S7+8</label>
            <input type="radio" name="semestre_choix1" id="choix1_S7S8" value="S7+8" class="border-black-600 border-2">
            <label for="S9+10">S9+10</label>
            <input type="radio" name="semestre_choix1" id="choix1_S9S10" value="S9+10" class="border-black-600 border-2">
        </p>
        <p><label for="choix2">Choix 2 :</label>
            <input type="text" name="choix2" class="border-black-600 border-2">
            <label for="S5">S5</label>
            <input type="radio" name="semestre_choix2" id="choix2_S5" value="S5" class="border-black-600 border-2">
            <label for="S7">S7</label>
            <input type="radio" name="semestre_choix2" id="choix2_S7" value="S7" class="border-black-600 border-2">
            <label for="S9">S9</label>
            <input type="radio" name="semestre_choix2" id="choix2_S9" value="S9" class="border-black-600 border-2">
            <label for="S5+6">S5+6</label>
            <input type="radio" name="semestre_choix2" id="choix2_S5S6" value="S5+6" class="border-black-600 border-2">
            <label for="S7+8">S7+8</label>
            <input type="radio" name="semestre_choix2" id="choix2_S7S8" value="S7+8" class="border-black-600 border-2">
            <label for="S9+10">S9+10</label>
            <input type="radio" name="semestre_choix2" id="choix2_S9S10" value="S9+10" class="border-black-600 border-2">
        </p>
        <p><label for="choix3">Choix 3 :</label>
            <input type="text" name="choix3" class="border-black-600 border-2">
            <label for="S5">S5</label>
            <input type="radio" name="semestre_choix3" id="choix3_S5" value="S5" class="border-black-600 border-2">
            <label for="S7">S7</label>
            <input type="radio" name="semestre_choix3" id="choix3_S7" value="S7" class="border-black-600 border-2">
            <label for="S9">S9</label>
            <input type="radio" name="semestre_choix3" id="choix3_S9" value="S9" class="border-black-600 border-2">
            <label for="S5+6">S5+6</label>
            <input type="radio" name="semestre_choix3" id="choix3_S5S6" value="S5+6" class="border-black-600 border-2">
            <label for="S7+8">S7+8</label>
            <input type="radio" name="semestre_choix3" id="choix3_S7S8" value="S7+8" class="border-black-600 border-2">
            <label for="S9+10">S9+10</label>
            <input type="radio" name="semestre_choix3" id="choix3_S9S10" value="S9+10" class="border-black-600 border-2">
        </p>
        <p>Fiche à renvoyer par mail au Service International au plus tard le : </p>
        <p><label for="date_signature">Date :</label>
        <input type="date" name="date_signature" required class="border-black-600 border-2">
        <label for="signature">Signature (mettre ses initiales) :</label>
        <input type="text" name="signature" required class="border-black-600 border-2"></p>
        <button type="submit"> Sauvegarder </button>
    </form>
</body>
<footer>
@include("footer")
</footer>
</html>
<script>
    document.getElementById("annee_actuelle_2A").onchange=function(){
        document.getElementById("choix1_S5").disabled=false;
        document.getElementById("choix1_S7").disabled=true;
        document.getElementById("choix1_S9").disabled=true;
        document.getElementById("choix1_S5S6").disabled=false;
        document.getElementById("choix1_S7S8").disabled=true;
        document.getElementById("choix1_S9S10").disabled=true;

        document.getElementById("choix2_S5").disabled=false;
        document.getElementById("choix2_S7").disabled=true;
        document.getElementById("choix2_S9").disabled=true;
        document.getElementById("choix2_S5S6").disabled=false;
        document.getElementById("choix2_S7S8").disabled=true;
        document.getElementById("choix2_S9S10").disabled=true;

        document.getElementById("choix3_S5").disabled=false;
        document.getElementById("choix3_S7").disabled=true;
        document.getElementById("choix3_S9").disabled=true;
        document.getElementById("choix3_S5S6").disabled=false;
        document.getElementById("choix3_S7S8").disabled=true;
        document.getElementById("choix3_S9S10").disabled=true;
    }
    document.getElementById("annee_actuelle_3A").onchange=function(){
        document.getElementById("choix1_S5").disabled=true;
        document.getElementById("choix1_S7").disabled=false;
        document.getElementById("choix1_S9").disabled=true;
        document.getElementById("choix1_S5S6").disabled=true;
        document.getElementById("choix1_S7S8").disabled=false;
        document.getElementById("choix1_S9S10").disabled=true;

        document.getElementById("choix2_S5").disabled=true;
        document.getElementById("choix2_S7").disabled=false;
        document.getElementById("choix2_S9").disabled=true;
        document.getElementById("choix2_S5S6").disabled=true;
        document.getElementById("choix2_S7S8").disabled=false;
        document.getElementById("choix2_S9S10").disabled=true;

        document.getElementById("choix3_S5").disabled=true;
        document.getElementById("choix3_S7").disabled=false;
        document.getElementById("choix3_S9").disabled=true;
        document.getElementById("choix3_S5S6").disabled=true;
        document.getElementById("choix3_S7S8").disabled=false;
        document.getElementById("choix3_S9S10").disabled=true;
    }
    document.getElementById("annee_actuelle_4A").onchange=function(){
        document.getElementById("choix1_S5").disabled=true;
        document.getElementById("choix1_S7").disabled=true;
        document.getElementById("choix1_S9").disabled=false;
        document.getElementById("choix1_S5S6").disabled=true;
        document.getElementById("choix1_S7S8").disabled=true;
        document.getElementById("choix1_S9S10").disabled=false;

        document.getElementById("choix2_S5").disabled=true;
        document.getElementById("choix2_S7").disabled=true;
        document.getElementById("choix2_S9").disabled=false;
        document.getElementById("choix2_S5S6").disabled=true;
        document.getElementById("choix2_S7S8").disabled=true;
        document.getElementById("choix2_S9S10").disabled=false;

        document.getElementById("choix3_S5").disabled=true;
        document.getElementById("choix3_S7").disabled=true;
        document.getElementById("choix3_S9").disabled=false;
        document.getElementById("choix3_S5S6").disabled=true;
        document.getElementById("choix3_S7S8").disabled=true;
        document.getElementById("choix3_S9S10").disabled=false;
    }
</script>