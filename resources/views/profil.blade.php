<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
    @include("nav")
</head>
<body>
<?php
echo("Prénom : ");
echo(session("prenom"));
echo("<br>Nom : ");
echo(session("nom"));
echo("<br>Adresse mail : ");
echo(session("mail"));
echo("<br>Identifiant UL : ");
echo(session("uid"));
echo("<br>Elève polytech ? ");
if(session("isPolytech")) echo("Oui");
else echo("Non");
?>
</body>
<footer>
@include("footer")
</footer>
</html>