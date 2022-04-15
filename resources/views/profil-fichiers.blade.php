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
            </section>
        </body>
    </x-slot>
</x-layout-profil>