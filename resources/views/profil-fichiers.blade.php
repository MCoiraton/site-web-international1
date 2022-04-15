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
        <body>
            <section class="text-gray-600 body-font pt-6">
                <form enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('fichier.store') }}" method="POST">
                    @csrf
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom"> Nom du fichier (pas besoin de mettre votre nom) </label>
                    <input type="text" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                    <input type="file" name="fichier" accept=".pdf"/>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Envoyer</button>
                </form>
            </section>
        </body>
    </x-slot>
</x-layout-profil>