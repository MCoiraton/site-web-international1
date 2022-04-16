<x-layout-profil>
    <x-slot name='tableau'>
		<style>
            #gestion {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Polytech Nancy International</title>
            <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
        </head>
        <script>
            function afficher_pdf(pdf){
                img=document.getElementById(pdf);
                if(img.style.display=="none") {
                    img.style.display ="block";
                    document.getElementById("bouton_"+pdf).innerHTML = "Cacher";
                }
                else {
                    img.style.display ="none";
                    document.getElementById("bouton_"+pdf).innerHTML = "Voir";
                }
            }
        </script>
        <body>
            <section class="text-gray-600 body-font pt-6">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h1 class="text-gray-700 text-sm font-bold mb-2">Fichiers en ligne :</h1>
                    @foreach($fichiers as $fichier)
                    <div>
                        <h2 class="text-gray-600 text-sm font-semibold mb-2">{{$fichier->nom}}</h2>
                        <button type="button" id="bouton_{{$fichier->nom}}" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick='afficher_pdf("{{$fichier->nom}}")'>Voir</button>
                        <form action="{{route('fichier.delete')}}" class="inline" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$fichier->id}}">
                            <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                        </form>
                        <embed
                            src="../{{$fichier->url}}"
                            type="application/pdf"
                            frameBorder="0"
                            scrolling="auto"
                            height="600px"
                            width="1000px"
                            id={{$fichier->nom}}
                            style="display:none"
                        />
                    </div>
                    @endforeach
                    <form enctype="multipart/form-data" class="mt-5" action="{{ route('fichier.store') }}" method="POST">
                        @csrf
                        <h2 class="text-gray-700 text-sm font-bold mb-2">Ajouter un fichier :</h2>
                        <label class="block text-gray-600 text-sm font-semibold mb-2" for="nom"> Nom du fichier (pas besoin de mettre votre nom) :</label>
                        <input type="text" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                        <input type="file" name="fichier" accept=".pdf"/>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Envoyer</button>
                    </form>
                </div>
            </section>
        </body>
    </x-slot>
</x-layout-profil>
