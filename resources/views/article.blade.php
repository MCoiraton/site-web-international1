<!DOCTYPE html>
<html class="bg-gray-200" lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Polytech Nancy International</title>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  @include(" nav")
</head>
<body>
    <div class="container px-5 py-16 mx-auto">
        <h1 class="text-center sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">{{$article->titre}}</h1>
        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">{{$article->contenu}}</p>
        <img src="{{asset($article->lienimage)}}" alt="" class="mx-auto">
    </div>
</body>
<footer>
  @include("footer")
</footer>
</html>