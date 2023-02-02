<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Réservation Chez :  <?php echo $data[0]['name']?></title>
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
        <link rel="stylesheet" type="text/css" href="Content/css/do_reservation_style.css">
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




<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg"></div>
						<?php echo "<form action='?controller=reservation&action=add_reservation&id=" .  $heure[0]['id_data'] . "' method='POST'>"?>
							<div class="form-header">
								<h2>Finaliser votre reservation chez <?php echo $data[0]['name']?></h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
                                        <?php
                                        echo "
                                        <span class='form-label'> Etudiants Max " .$data[0]['capacity_stand']."</span>
                                        <input class='form-control' type='number' name='cap' placeholder= 'Max " . $data[0]['capacity_stand'] .  "' class='form-control' min='1' max='" .$data[0]['capacity_stand'] . "'"."required>";
										    
                                           ?>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label" >Email</span>
								<input class="form-control" name='email'type="email" placeholder="Enter your email" required>
							</div>
							<p style="font-size:12px; font-weight:50; margin:0;"> <strong style="color:gray;">Vous receverez un email de confirmation.</strong> Réserver ce créneau implique que vous prenez la responsabilité de celui-ci et donc serez sanctionné si il n'est pas respect ou vous venez à déserté </br>
                            </p> <p style="font-size:14px; font-weight:50; margin:0; color:#93CAED;"> Lisez nos  <a href="">Conditions Générals d'Utilisations</a></p>
							<div class="form-btn">
								<button class="submit-btn">Réserver</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php
 require('view_end.php');
  ?>