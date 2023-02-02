<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Connexion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="Content/img/site_logo.png" href="Content/img/site_logo.png">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans Narrow"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="Content/css/home_style.css"/>
    <link rel="stylesheet" type="text/css" href="Content/css/form_style.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/header_style.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css">

        <link rel="stylesheet" href="Content/css/responsive.css">
		<PackageReference Include="jQuery" Version="3.3.1" />
		<PackageReference Include="jQuery" Version="3.3.1" />
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	</head>
	<body>
      
    <header id='header'>
    <div href="#" id="cf">
      <a href="?controller=home">
        <img class="bottom" src="Content/img/Animath_after.png"/>
        <img class="top" src="Content/img/Animath.png" />
        </a>
    </div>
      <nav>
      <a href="?controller=reservation" class="link link--eirene"><span>Réservation</span></a>
      <a href="#" class="link link--eirene"><span>A propos de Nous</span></a>
        <img  onmouseenter="openlog()" onmouseleave="closelog()" class='login' src="Content/img/icon.png" />
      </span></a>
      <div id='pop' onmouseenter="openlog()" onmouseleave="closelog()">
      
        <button class="noselect"><a href="?controller=inscription"><span class='text'>Inscription</span><span class="icon"></span></a></button>
        
        
        <button class="noselect"><a href="?controller=connexion"><span class='text'>Connexion</span><span class="icon"></span></a></button>
        
      </div>
      </nav>
    </header>

    <script>
function openlog() {
  document.getElementById("pop").style.visibility = "visible";
  document.getElementById("pop").style.opacity = 1;
}
function closelog() {
  document.getElementById("pop").style.visibility = "hidden";
  document.getElementById("pop").style.opacity = 0;
}
    </script>
<link rel="stylesheet" type="text/css" href="Content/css/connexion_style.css"/>
<main>
<div id="login-form-wrap" >
  <h2>Connexion</h2>
  <form id="login-form" action='?controller=connexion&action=dologin' method='post'>
    <p>
    <input type="email" id="username" name="email" placeholder="Email" required><i class="validation"></i>
    </p>
    <p>
    <input type="password" id="email" name="password" placeholder="Mot de passe" required><i class="validation"></i>
    </p>
    <p>
    <input type="submit" id="login" value="Connexion">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Vous n'avez pas de compte <a href="?controller=inscription">Inscription</a><p>
<a href="?controller=inscription">Mot de passe Oublié </a>
  </div>
</div>
</main>
<?php
require('view_end.php')
?>
