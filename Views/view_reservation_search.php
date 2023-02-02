

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Stand</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="Content/img/site_logo.png" href="Content/img/site_logo.png">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans Narrow"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="Content/css/footer_style_forreservation.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/header_style do.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Content/css/style.css">
        <link rel="stylesheet" type="text/css" href="Content/css/reservation_style.css">
        <link rel="stylesheet" type="text/css" href="Content/css/filter.css">
        <link rel="stylesheet" href="Content/css/responsive.css">
		<PackageReference Include="jQuery" Version="3.3.1" />
		<PackageReference Include="jQuery" Version="3.3.1" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="Content/css/main.css" rel="stylesheet" />
    <script src="Content/js/extention/choices.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <style>
        .a:hover{
         transform: translateZ(10%);

        }
        .a{
        }
      </style>
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
    <div class="s131">
    <form action="?controller=reservation&action=search_stand" method="POST" >
        <div class="inner-form">
          <div class="input-field first-wrap">
            <input id="search" type="time" name='temps_start' placeholder="Heure Debut" min="09:00" max="18:00" value="09:30" style='text-align: center; width: 175px;  '/>
          </div>
          <div style='margin-left:50px; padding-right:300px;'>
          <label style='text-align:center; font-size:20px; color: gray;'>Primaire
              <input type="checkbox" value="primaire" name='niveau[]'  style='  font-family: system-ui, sans-serif;
  font-size: 2rem;
  font-weight: bold;
  line-height: 1.1;
  display: grid;
  grid-template-columns: 1em auto;
  gap: 0.5em;
  width:25px;
  height:25px;
  margin-bottom:18.5px;
  margin-left:10px;

  border-radius:5px;

' <?php if(isset($nv1)){ echo $nv1; } ?>>

            </label>
            <label style='text-align:center; font-size:20px; color: gray;'>Collège
              <input type="checkbox" value="college" name='niveau[]' style='  font-family: system-ui, sans-serif;
  font-size: 2rem;
  font-weight: bold;
  line-height: 1.1;
  display: grid;
  grid-template-columns: 1em auto;
  gap: 0.5em;
  width:25px;
  height:25px;
  margin-bottom:18.5px;
  margin-left:10px;

        border-radius:5px;
' <?php if(isset($nv2)){ echo $nv2; }

 ?>>
              </label>
              <label style='text-align:center; font-size:20px; color: gray;'>Lycée
              <input type="checkbox" value="lycee" name='niveau[]' style='  font-family: system-ui, sans-serif;
  font-size: 2rem;
  font-weight: bold;
  line-height: 1.1;
  display: grid;
  grid-template-columns: 1em auto;
  gap: 0.5em;
  width:25px;
  height:25px;
  border-radius:5px;
  margin-left:10px;
  margin-bottom:18.5px;
' <?php if(isset($nv3)){ echo $nv3; } ?>>
              </label>
              </div>
          <div class="input-field second-wrap">
            <div class="input-select">
              <select data-trigger="" name="Jour">
                <option placeholder="Jour"disabled>Jour</option>
                <option>Jeudi</option>
                <option>Vendredi</option>
              </select>
              
            </div>
            
          </div>
          <div class="input-field third-wrap">
            <input type="submit" class="btn-search" type="button" value="Rechercher">
            
          </div>
        </div>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false
      });

    </script>
    <!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:2500px;margin-top:100px; ">

<!-- First Photo Grid-->
<?php
 echo "<div class='w3-row-padding w3-padding-16 w3-center' id='food'>";
 $i = 0;
   foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {

    if ($i != 4) {
      echo "<a href='?controller=reservation&action=show_reservation&name=". urlencode($v['name']) . "' class='a'>
      <div class='w3-quarter' id='change' onmouseenter='select()' onmouseleave='unselect()' style='padding-top:50px; width:400px; padding-bottom:50px; padding-left:80px; padding-right:80px; border-radius: 20px; margin-left: 10px; margin-top:100px; margin-top:100px;' >

 
          <h2>"
           . $v['name'] . " </h2>
          <span style='
          display:block;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 45ch;'>" . $v['summary'] ."</span>
          
        </div>
        </a>";
      $i= $i +1;
    }
    elseif($i = 4){
      $i =0 ;
      echo "</div>";
      echo "<div class='w3-row-padding w3-padding-16 w3-center' id='food'>";
    }
    }
    
  }
?>
<!-- Pagination -->
<div class="w3-center w3-padding-32">
  <div class="w3-bar">
    <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
    <a href="#" class="w3-bar-item w3-black w3-button">1</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
    <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
  </div>
</div>

<script>
function openlog() {
  document.getElementById("pop").style.visibility = "visible";
  document.getElementById("pop").style.opacity = 1;
}
function closelog() {
  document.getElementById("pop").style.visibility = "hidden";
  document.getElementById("pop").style.opacity = 0;
}
function select() {
  document.getElementById("change").style.witdh = '300px';

}
function unselect() {
  document.getElementById("change").style.witdh = '200px';

}
    </script>
    <script src="Content/js/extention/choices.js"></script>
    <script src="Content/js/extention/flatpickr.js"></script>

<?php
 require('view_end.php');
  ?>
