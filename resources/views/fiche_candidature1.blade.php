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

<body>

    <section class="text-gray-600 body-font pt-6">
        <div class="container w-3/4 max-h-full mx-auto flex items-center justify-center">
            <div class="w-full max-w-full">
                <h1 class="text-4xl text-gray-900 flex items-center justify-center">Fiche candidature à un échange international</h1>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="#" method="POST">
                    <h2 class="text-xl mb-4 text-gray-700">Informations Personelles:</h2>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="prénom">
                            Prénom:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="prénom" type="text">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="nom">
                            Nom:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nom" type="text">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="date_naissance">
                            Date de Naissance:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="date_naissance" type="date">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="nationalite">
                            Nationalité:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nationalite" type="text">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="rue_adresse">
                            Adresse fixe:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="rue_adresse" type="text">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="code_postal">
                            Code Postal:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="code_postal" type="number">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="tel_fixe">
                            Tél Fixe:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tel_fixe" type="tel">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="tel_portable">
                            Tél Portable:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tel_portable" type="tel">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="email">
                            E-mail:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="mail">
                    </div>
                    
                    <div class="mb-4 flex">
                        <label class="flex-row text-gray-700 text-md font-bold mb-2 mr-4" for="boursier">Boursier national: </label>
                        <input class="my-1" type="radio" name="boursier" value="Oui" class="border-black-600 border-2">
                        <label class="ml-2" for="Oui">Oui (échelon 0 inclus)</label>
                        <input class="my-1 ml-6" type="radio" name="boursier" value="Non" class="border-black-600 border-2"></p>
                        <label class="ml-2" for="Non">Non</label>
                    </div>        
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2" for="region_origine">
                            Région d'origine:
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="region_origine" type="text">
                    </div>

                    <h2 class="text-xl mb-4 text-gray-700">Informations Scolarité:</h2>
                    <div class="mb-4 flex">
                        <label class="flex-row text-gray-700 text-md font-bold mb-2 mr-4" for="annee_entree">Année d'entrée à Polytech: </label>
                        <input class="my-1" type="radio" name="annee_entree" value="1A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="1A">1A</label>
                        <input class="my-1" type="radio" name="annee_entree" value="2A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="2A">2A</label>
                        <input class="my-1" type="radio" name="annee_entree" value="3A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="3A">3A</label>
                        <input class="my-1" type="radio" name="annee_entree" value="4A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="4A">4A</label>
                        <input class="my-1" type="radio" name="annee_entree" value="5A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="5A">5A</label>
                    </div>
                    <div class="mb-4 flex">
                        <label class="flex-row text-gray-700 text-md font-bold mb-2 mr-4" for="annee_actuelle">Année d'études actuelle: </label>
                        <input class="my-1" type="radio" name="annee_actuelle" value="1A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="1A">1A</label>
                        <input class="my-1" type="radio" name="annee_actuelle" value="2A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="2A">2A</label>
                        <input class="my-1" type="radio" name="annee_actuelle" value="3A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="3A">3A</label>
                        <input class="my-1" type="radio" name="annee_actuelle" value="4A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="4A">4A</label>
                        <input class="my-1" type="radio" name="annee_actuelle" value="5A" class="border-black-600 border-2">
                        <label class="ml-2 mr-4" for="5A">5A</label>
                    </div> 

                    <div class="mb-4 flex-col">
                        <label class="flex-row text-gray-700 text-md font-bold mb-2 mr-4" for="diplome">Diplôme choisi: </label>
                        <p class="ml-28">
                            <input class="my-1" type="radio" name="diplome" value="EMME" class="border-black-600 border-2">
                            <label class="ml-2 mr-4 text-gray-900 underline" for="EMME">EMME</label>
                            <input class="my-1" type="radio" name="parcours" value="MFE" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="MFE">MFE</label>
                            <input class="my-1" type="radio" name="parcours" value="MSM" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="MSM">MSM</label>
                        </p>

                        <p class="ml-28">
                            <input class="my-1" type="radio" name="diplome" value="IA2R" class="border-black-600 border-2">
                            <label class="ml-2 mr-4 text-gray-900 underline" for="IA2R">IA2R</label>
                            <input class="my-1" type="radio" name="parcours" value="SIA" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="SIA">SIA</label>
                            <input class="my-1" type="radio" name="parcours" value="SIR" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="SIR">SIR</label>
                        </p>

                        <p class="ml-28">
                            <input class="my-1" type="radio" name="diplome" value="M3" class="border-black-600 border-2">
                            <label class="ml-2 mr-4 text-gray-900 underline" for="M3">M3</label>
                            <input class="my-1" type="radio" name="parcours" value="MSS" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="MSS">MSS</label>
                            <input class="my-1" type="radio" name="parcours" value="MCL" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="MCL">MCL</label>
                        </p>
                    </div>
                    <div>
                        <label class="ml-2 mr-4 text-gray-700 text-md font-bold" for="langues">Langues étrangères:</label>
                        <div class="w-1/2">
                            <label class="ml-2 mr-4" for="langues">Langue n°1:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="langues1" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="annee_langues1">Nombre d'années d'études :</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="annee_langues1" class="border-black-600 border-2">
                        </div>
                        <div class="w-1/2">
                            <label class="ml-2 mr-4" for="langues">Langue n°2:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="langues2" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="annee_langues2">Nombre d'années d'études :</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="annee_langues2" class="border-black-600 border-2">
                        </div>
                        <div class="w-1/2">
                            <label class="ml-2 mr-4" for="langues">Langue n°3:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="langues3" class="border-black-600 border-2">
                            <label class="ml-2 mr-4" for="annee_langues3">Nombre d'années d'études :</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="annee_langues3" class="border-black-600 border-2">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="text-gray-700 text-md font-bold" for="toeic">Score TOEIC :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="toeic" class="border-black-600 border-2">
                        <label for="annee_toeic">Année :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="annee_toeic" class="border-black-600 border-2">
                    </div>
                    <div class="mt-6">
                        <label for="deja_parti">Êtes-vous déjà parti en échange ERASMUS :</label>
                        <input class="my-1" type="radio" name="deja_parti" value="Oui" class="border-black-600 border-2">
                        <label for="Oui">Oui</label>
                        <input class="my-1" type="radio" name="deja_parti" value="Non" class="border-black-600 border-2">
                        <label for="Non">Non</label>
                    </div>

                    <div class="mt-2">
                        <label for="dest_date_deja_parti">Si oui, destination et dates du séjour:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="dest_deja_parti" class="border-black-600 border-2">
                        <input class="mt-2 border-2 border-gray-500 rounded p-1" type="date" name="date_deja_parti" class="border-black-600 border-2">
                    </div>

                    <div class="mt-6">
                        <h2>Indiquez par ordre de préférence 3 destinations:</h2>
                        <p class="text-sm text-gray-500">*Liste des destinations disponible sur le Site Web de Polytech Nancy, menu "INTERNATIONAL", "Etudes à l’étranger", et dans l’Intranet
                        de Polytech Nancy menu "9. International"</p>
                    </div>

                    <div class="mt-4">
                        <label for="choix1">Choix 1 :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="choix1" class="border-black-600 border-2">
                        <label for="S5">S5</label>
                        <input class="my-1" type="radio" name="semestre_choix1" value="S5" class="border-black-600 border-2">
                        <label for="S7">S7</label>
                        <input class="my-1" type="radio" name="semestre_choix1" value="S7" class="border-black-600 border-2">
                        <label for="S9">S9</label>
                        <input class="my-1" type="radio" name="semestre_choix1" value="S9" class="border-black-600 border-2">
                        <label for="S5+6">S5+6</label>
                        <input class="my-1" type="radio" name="semestre_choix1" value="S5+6" class="border-black-600 border-2">
                        <label for="S7+8">S7+8</label>
                        <input class="my-1" type="radio" name="semestre_choix1" value="S7+8" class="border-black-600 border-2">
                        <label for="S9+10">S9+10</label>
                        <input class="my-1" type="radio" name="semestre_choix1" value="S9+10" class="border-black-600 border-2">
                    </div>
                    <div class="mt-4">
                        <label for="choix2">Choix 2 :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="choix2" class="border-black-600 border-2">
                        <label for="S5">S5</label>
                        <input class="my-1" type="radio" name="semestre_choix2" value="S5" class="border-black-600 border-2">
                        <label for="S7">S7</label>
                        <input class="my-1" type="radio" name="semestre_choix2" value="S7" class="border-black-600 border-2">
                        <label for="S9">S9</label>
                        <input class="my-1" type="radio" name="semestre_choix2" value="S9" class="border-black-600 border-2">
                        <label for="S5+6">S5+6</label>
                        <input class="my-1" type="radio" name="semestre_choix2" value="S5+6" class="border-black-600 border-2">
                        <label for="S7+8">S7+8</label>
                        <input class="my-1" type="radio" name="semestre_choix2" value="S7+8" class="border-black-600 border-2">
                        <label for="S9+10">S9+10</label>
                        <input class="my-1" type="radio" name="semestre_choix2" value="S9+10" class="border-black-600 border-2">
                    </div>
                    <div class="mt-4">
                        <label for="choix3">Choix 3 :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="choix3" class="border-black-600 border-2">
                        <label for="S5">S5</label>
                        <input class="my-1" type="radio" name="semestre_choix3" value="S5" class="border-black-600 border-2">
                        <label for="S7">S7</label>
                        <input class="my-1" type="radio" name="semestre_choix3" value="S7" class="border-black-600 border-2">
                        <label for="S9">S9</label>
                        <input class="my-1" type="radio" name="semestre_choix3" value="S9" class="border-black-600 border-2">
                        <label for="S5+6">S5+6</label>
                        <input class="my-1" type="radio" name="semestre_choix3" value="S5+6" class="border-black-600 border-2">
                        <label for="S7+8">S7+8</label>
                        <input class="my-1" type="radio" name="semestre_choix3" value="S7+8" class="border-black-600 border-2">
                        <label for="S9+10">S9+10</label>
                        <input class="my-1" type="radio" name="semestre_choix3" value="S9+10" class="border-black-600 border-2">
                    </div>
                    <div class="mt-4">
                            <p>Fiche à renvoyer par mail au Service International au plus tard le : </p>
                            <label for="date_signature">Date :</label>
                            <input class="mt-2 border-2 border-gray-500 rounded p-1" type="date" name="date_signature" class="border-black-600 border-2">
                    </div>
                    <div class="mt-4">
                        <label for="signature">Signature (mettre ses initiales) :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="signature" class="border-black-600 border-2">
                    </div>
                    <button class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit"> Sauvegarder </button>
                </form>
            </div>
        </div>
    </section>

</body>

<footer>
    @include('footer');
</footer>