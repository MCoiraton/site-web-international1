<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Polytech Nancy International</title>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>

<body class="bg-gray-200 h-full">
    @include("nav")
    <div class="flex flex-row">
        <div class="bg-white p-4 m-6 rounded-lg ">
            <aside id="sidebar" class="w-64" aria-label="Sidebar">
                <div class="relative flex-1 flex flex-col rounded-lg bg-white pt-0">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex-1 px-3 bg-white divide-y space-y-1">
                            <ul class="space-y-2 pb-2">
                                <li>
                                    <a href="/admin/accueil" id="acceuil" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-300 group">
                                        {{ $accueil ?? '' }}
                                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 -1.5 27 27" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m24.749 0h-22.498c-1.243 0-2.25 1.007-2.25 2.25v14.999c0 1.243 1.007 2.25 2.25 2.25h8.999l-.75 2.25h-3.376c-.621 0-1.125.504-1.125 1.125s.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125s-.504-1.125-1.125-1.125h-3.375l-.75-2.249h8.999c1.242 0 2.25-1.007 2.25-2.249v-15.001c0-1.243-1.007-2.25-2.25-2.25zm-.751 16.499h-20.999v-13.499h20.999z" />
                                        </svg>
                                        <span class="ml-3">Gestion page d'acceuil</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/gestion/" id="gestion" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        {{ $gestion ?? '' }}
                                        <svg id="gestion" class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                        </svg>
                                        <span class="ml-3 flex-1 whitespace-nowrap">Gestion Universités</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/fiches" id="fiches" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        {{ $fiches ?? '' }}
                                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-3 whitespace-nowrap">Fiches Candidatures</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/fichiers" id="fichiers" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        {{ $fichiers ?? '' }}
                                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-3 whitespace-nowrap">Fichiers étudiants</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/utilisateurs" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        {{ $utilisateurs ?? '' }}
                                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-3 flex-1 whitespace-nowrap">Utilisateurs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="bg-white rounded-lg m-6 p-4 flex-grow">
            {{ $panel ?? '' }}
        </div>
    </div>
</body>
<footer class="">
    @include("footer")
</footer>