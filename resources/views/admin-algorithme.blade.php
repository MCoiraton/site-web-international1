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
        <body>
        <div class="mt-4 flex flex-col items-center bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Gestion de l'Algorithme</h3>
                        <span class="text-base font-normal text-gray-500">Vous pouvez ici lancer l'algorithme d'attribution des voeux et ajouter le fichier excell des scores</span>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <a href="/admin/algorithme/run" class='bg-blue-500 m-2 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id="btnAlgo">Attribuer les voeux</a>
                </div>
                <form enctype="multipart/form-data" class="mt-5" action="" method="POST">
                    @csrf
                    <h2 class="text-gray-700 text-sm font-bold mb-2">Ajouter les scores (fichier excel):</h2>
                    <span class="text-base font-normal text-gray-500">Le fichier excel doit contenir au moins 2 colonnes nommées id et score (sans majuscule), id correspondant au numero étudiant</span>
                    <input id="upload" type="file" name="fichier" accept=".xls,.xlt,.xml,.xlsx" max-file-size="500" />
                    <button class="bg-blue-500 hover:bg-blue-700 text-white mt-4 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Upload</button>
                </form>
            </div>
        </body>
    </x-slot>
</x-layout-admin>