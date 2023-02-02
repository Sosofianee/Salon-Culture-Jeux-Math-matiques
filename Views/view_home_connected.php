<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" type="Content/img/site_logo.png" href="Content/img/site_logo.png">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans Narrow"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="Content/css/home_style.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/header_style.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Content/css/style.css">
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

        <button class="noselect"><a href="?controller=myaccount"><span class='text'>Compte</span><span class="icon"></span></a></button>


        <button class="noselect"><a href="?controller=deconnexion&action=deconnexion"><span class='text'>Déconnexion</span><span class="icon"></span></a></button>

      </div>
      </nav>
      
    </header>
    <main>
    <div class="banner_section banner_bg">
         <div class="container-fluid">
            <div id="my_slider" class="carousel slide" data-ride="carousel">

               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="taital_main">

                        <div class="taital_left">
                           <h1 class="banner_taital">NONE</h1>

                           <div class="read_bt"><a href="#">En Savoir Plus</a></div>
                        </div>
                        <div class="taital_right">
                        <img src="Content/img/background_home.jpg" style='width: 50%;'>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="taital_main">
                        <div class="taital_left">
                           <h1 class="banner_taital">NONE</h1>
                           <div class="read_bt"><a href="#">En Savoir Plus</a></div>
                        </div>
                        <div class="taital_right">

                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="taital_main">
                        <div class="taital_left">
                           <h1 class="banner_taital">NONE</h1>
                           <div class="read_bt"><a href="#">En Savoir Plus</a></div>
                        </div>
                        <div class="taital_right">
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>


      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div><img src="Content/img/background_home.jpg" class="about_img"></div>
               </div>
               <div class="col-md-6">
                  <h1 class="about_taital">NONE</h1>
                  <div class="border"></div>
                  <p class="about_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitationconsectetur adipiscing </p>
                  <div class="read_bt_1"><a href="#">En Savoir Plus</a></div>
               </div>
            </div>
         </div>
      </div>


      <div class="product_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="product_taital">NONE</h1>
                  <p class="product_text">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</p>
               </div>
            </div>




      </main>
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

 <?php
 require('view_end.php');
  ?>
