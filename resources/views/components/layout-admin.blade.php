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
    <nav class="bg-white border-b border-gray-200 rounded-lg p-4 m-6 lg:px-5 lg:pl-3 flex items-center justify-start">
        <a href="/" class="text-xl font-body flex items-center lg:ml-2.5">
            <img src="{{ asset('img/logo.png')}}" class="h-10 mr-2" alt="Polytech Logo">
        </a>
        <form action="#" method="GET" class="lg:block lg:pl-32">
            <label for="topbar-search" class="sr-only">Search</label>
            <div class="mt-1 relative lg:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
            </div>
        </form>
    </nav>
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