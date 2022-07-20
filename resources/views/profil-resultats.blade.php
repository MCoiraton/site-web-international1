<x-layout-profil>
    <x-slot name='resultat'>
        <style>
            #resultat {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            }

            ;
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
            <link rel="stylesheet" href="{{ asset('css/app.css')}}">
            <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        </head>
        
        <body class="bg-gray-200">
            <section class="text-gray-600 bg-white body-font m-6 rounded-lg">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap w-full mb-20">
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Résultat de votre affectation:</h1>
                            <div class="h-1 w-20 bg-indigo-500 rounded">
                            </div>
                            <div>
                                @if($resultat==null)
                                    <p>Votre affectation est en attente</p>
                                @else
                                    <p>Vous avez obtenu votre voeu en position {{$position}}:</p>
                                    <h3 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{$resultat}}</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </body>
    </x-slot>
</x-layout-profil>