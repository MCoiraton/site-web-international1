<x-layout-admin>
    <x-slot name='algorithme'>
		<style>
            #algorithme {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
        <script>
            function algo_start(){
                var candidats=$listeCandidat;
                var cours=$listeCours;
                var stop=false;
                cours.sort(function(a,b){//on trie les élèves suivant leurs scores.
                    return a.score-b.score;
                })
                var tblAffectation= new Array(cours.length);//tableau 2 dimension pour savoir combien de personnes sont déja affiliés
                for (var i = 0; i < tblAffectation.length; i++)
                {
                    tblAffectation[i] = new Array(2);
                    tblAffectation[i][0]=cours.code;
                    tblAffectation[i][1]=0;
                }
                for (let j=1;j<=5;j++){ //voeux par voeux
                    var i=0;
                    while(candidats.length!=0 || stop){
                        //pour chaque éléves, on verifie si leur voeux est libre
                        let idCours=findCours((getChoixJ(candidats[i],j)))
                        if(cours[idCours].nombre>tblAffectation[idCours][1]){
                            //si le voeux est libre, on ajoute une affectation et on suprimme le candidat de la liste en attente
                            tblAffectation[idCours][1]+=1;
                            setResultatJ(candidats[i],j,true);
                            candidats.splice(i,1);
                        }
                        else i++;
                        stop=verifPlace(tblAffectation);//on stop si saturation complète
                    }
                }
                alert("algo fin");
            }
            
            function findCours(nomCours){
                id=null;
                for(let i=0;i<=$listeCours.length;i++){
                    if($listeCours[i].code==nomCours)id=i;
                }
                return id
            }

            function getChoixJ(candidat, choix){
                switch(choix){
                    case 1 : return candidat.choix1;
                    case 2 : return candidat.choix2;
                    case 3 : return candidat.choix3;
                    case 4 : return candidat.choix4;
                    case 5 : return candidat.chois5;
                    default : return null;
                }
            }

            function setResultatJ(candidat, resultatJ, bool){
                switch(resultatJ){
                    case 1 : candidat.resultat1=bool;
                    case 2 : candidat.resultat2=bool;
                    case 3 : candidat.resultat3=bool;
                    case 4 : candidat.resultat4=bool;
                    case 5 : candidat.resultat5=bool;
                }
            }

            function verifPlace(tblAffectation){
                //on verifie le nb de cours saturé, retourne true si saturé
                var nbSature=0;
                for(var i=0;i<tblAffectation.length;i++){
                    if(tblAffectation[i][1]==cours[findcours(tblAffectation[i][0])].nombre){
                        nbSature+=1;
                    }
                }
                return nbSature==tblAffectation.length;
            }

        </script>
        <body>
        <div class="mt-4 flex flex-col items-center bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Gestion de l'Algorithme</h3>
                        <span class="text-base font-normal text-gray-500">Vous pouvez ici lancer l'algorithme d'attribution des voeux et ajouter le fichier excell des scores</span>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <button class='bg-blue-500 m-2 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id="btnAlgo" onclick="algo_start()">Attribuer les voeux</button>
                </div>
            </div>
        </body>
    </x-slot>
</x-layout-admin>