<!DOCTYPE html>
<html class="bg-gray-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
    @include("nav")
</head>

<body>
  <section class="text-gray-600 body-font bg-white m-6 rounded-lg p-6">
    <div class="lg:w-2/3 w-full m-auto lg:mb-0 overflow place-self-center">
        <img alt="feature" class="object-cover rounded-lg object-center h-full w-full" src="{{ asset('img/glasgow.jpeg') }}">
    </div>
    <div class="container px-5 py-16 mx-auto">
      <div class="text-center mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Site Intranet des Relations Internationales de POLYTECH Nancy</h1>
        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">Polytech Nancy offre une vaste liste de destinations internationales pour ses étudiants qui souhaitent effectuer un séjour à l'étranger, et les accompagne dans toutes les démarches pour garantir leur réussite.</p>
        <div class="flex mt-6 justify-center">
          <div class="w-3/4 border-t-8 border-blue-600 border-dotted inline-flex"></div>
        </div>
      </div>
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5 flex-shrink-0">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Description générale</h2>
            <p class="leading-relaxed text-base">Voici une explication assez générale et rapide sur les échanges Erasmus: qu’est-ce que c’est, qui sont les personnes éligibles, quelles sont les procédures, etc.. Vous trouverez les informations ...</p>
            <a class="mt-3 text-blue-500 inline-flex items-center">En savoir plus...
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5 flex-shrink-0">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <circle cx="6" cy="6" r="3"></circle>
              <circle cx="6" cy="18" r="3"></circle>
              <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Avant de partir</h2>
            <p class="leading-relaxed text-base">Pour le choix des cours dans l’université étrangère, allez sur le site web de l’université et le programme des études se trouve généralement dans la rubrique Studies, Master Programmes, ...</p>
            <a class="mt-3 text-blue-500 inline-flex items-center">En savoir plus...
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-5 flex-shrink-0">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Contacts et liens utiles</h2>
            <p class="leading-relaxed text-base">GÖTEBORG, SUEDE   Groupe Facebook Français à Göteborg Erasmus 2014/2015 (vous pouvez voir des annonces de logements qui se libèrent) Erasmus 2015/2016 Annonces de logements Voyages Scandinavian ...</p>
            <a class="mt-3 text-blue-500 inline-flex items-center">En savoir plus...
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <a href="/destinations">
        <button class="flex mx-auto mt-16 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Découvrir nos destinations</button>
      </a>
    </div>
  </section>
</body>
<footer>
@include("footer")
</footer>
</html>