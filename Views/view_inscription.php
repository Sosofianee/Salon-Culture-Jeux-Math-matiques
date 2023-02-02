<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Inscription</title>
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
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <main>
        <div id="login-box">
          <form class="left" action='?controller=inscription&action=add_user' method='post'>
            <h1>Inscription</h1>

            <input type="text" name="Nom" required placeholder="Nom"
          oninvalid="this.setCustomValidity('Entrez votre Nom')"
          oninput="this.setCustomValidity('')"/>
          <input type="text" name="Prenom" required placeholder="Prenom"
          oninvalid="this.setCustomValidity('Entrez votre Prenom')"
          oninput="this.setCustomValidity('')"/>
          <input type="text" name="email" required placeholder="Email"
          oninvalid="this.setCustomValidity('Entrez votre Email')"
          oninput="this.setCustomValidity('')"/>
            <input type="text" name="Etablissement" required placeholder="Etablissement"
          oninvalid="this.setCustomValidity('Entrez votre Etablissement')"
          oninput="this.setCustomValidity('')"/>
          <input type="text" name="Ville" required placeholder="Ville"
          oninvalid="this.setCustomValidity('Entrez votre Ville')"
          oninput="this.setCustomValidity('')"/>
            <div class="scale"><p class="select"> Selectionnez les niveaux de votre classe :</p>
            <label class="rad-label">
    <input type="checkbox" class="rad-input" value='primaire' name="rad[]">
    <div class="rad-design"></div>
    <div class="rad-text">Primaire</div>
  </label>

  <label class="rad-label">
    <input type="checkbox" class="rad-input" value='college' name="rad[]">
    <div class="rad-design"></div>
    <div class="rad-text">College</div>
  </label>

  <label class="rad-label">
    <input type="checkbox" class="rad-input" value='lycee' name="rad[]">
    <div class="rad-design"></div>
    <div class="rad-text">Lycee</div>
  </label>

     </div>
     <div class="cadre">
     <p class="tt">Entrez le Nombre d'eleves dans votre classe : </p>
     <input class="ttt"type="number" min="0" max="60"  name="num_eleve" value="Nombre Eleve" autocomplete="off"  required placeholder="0"
          oninvalid="this.setCustomValidity('Entrez le Nombre d eleves Here')"
          oninput="this.setCustomValidity('')" />
          </div>
            <input type="password" name="password" required placeholder="Mot de passe"
          oninvalid="this.setCustomValidity('Entrez votre Mot de passe')"
          oninput="this.setCustomValidity('')"/>
            <input type="password" name="password2" placeholder="Retaper Mot de passe" required
            oninvalid="this.setCustomValidity('Réecrivez votre Mot de passe')"
          oninput="this.setCustomValidity('')"/>
          <p class='cgu'>En cliquant sur S’inscrire, vous acceptez nos <a href='#' onclick="CGU()"> Conditions générales</a>.</p>
          <input type="submit" name="signup_submit" value="S'inscrire" onclick="customAlert.alert('This is a custom alert without heading.')"/>

          </form>


        </div>
      </main>

      <script>
		  function CGU(){
				var cgu = {
	"text": [
		"Bienvenue sur le site des inscriptions des groupes scolaires du Salon Culture et Jeux Mathématiques ! En vous inscrivant pour créer un compte sur notre site, vous acceptez d’être lié(e) par les conditions générales d’utilisation suivantes.\n",
		"",
		"Article 1: Mention légale ",
		"Le site d’inscription au salon culture et jeux mathématiques, inscription.salon-math.fr, est la propriété de l’association Animath – IHP domicilié au 11-13 Rue Pierre et Marie Curie, 75231 Paris Cedex 05. Le bureau administratif d’Animath est ouvert du lundi au vendredi de 9h à 13h et de 14h à 17h. Pour toute question contacter : salon-culture-jeux-maths@animath.fr ",
		"",
		"Hébergeur :  ",
		"Le présent site est hébergé en France par l’entreprise Scaleway.",
		"Société par Actions Simplifiée au capital de 214 410,50 Euros",
		"SIREN : 433 115 904 RCS Paris",
		"Siège social : 8 rue de la Ville l’Evêque, 75008 Paris",
		"",
		"",
		"Article 2: Accès au site/à l’application ",
		"Le site inscription.salon-math.fr, a pour objectif l’inscription autonome des enseignant·es, accompagnés de groupes scolaires, souhaitant se rendre au Salon Culture et Jeux Mathématiques ayant lieu le dernier weekend de mai, Place Saint Sulpice, Paris 75006.",
		"",
		"La création d’un compte enseignant·e, permet à l’utilisateur de programmer sa visite au salon en sélectionnant les activités, ateliers ou conférences en fonction du niveau de sa ou ses classes et des créneaux disponibles proposés par les exposants et conférenciers présents durant le salon. ",
		"",
		"",
		"Article 3: Les droits et les obligations de l’éditeur",
		"Le site inscription.salon-math.fr et l’association Animath mettent tout en œuvre pour offrir aux utilisateurs un site accessible 24 heures sur 24 et 7 jours sur 7, à l’exception des cas de force majeure et difficultés techniques ou informatiques. Le site s’engage également à ne publier que des informations et/ou des outils vérifiés, mais ne saurait être tenu responsable des erreurs, d’une absence de disponibilité des informations et/ou de la présence de virus sur son site.",
		"",
		"L’association Animath, dont les coordonnées figurent à l’article 1 de la présente charte, s’engage à ne pas transmettre, sous aucun prétexte, les informations collectées lors de l'inscription de l’enseignant·e. Ces informations ne seront traitées et collectées que par l’association Animath, à but informatif afin de permettre la mise en place d’un planning global des visites. ",
		"",
		"Des mises à jour régulières du site peuvent être également effectuées, dans ce cas l’utilisateur en sera informé. Dans le cas où celles-ci rendraient impossible l’accès à son compte enseignant·e, l’utilisateur sera invité à réitérer sa tentative de connexion ultérieurement.  ",
		"",
		"Le site inscription.salon-math.fr, s’engage à ne pas partager les informations données par l’utilisation lors de la création de son compte personnel enseignant·e. ",
		"",
		"",
		"Article 4: Les droits et les obligations de l’utilisateur",
		"L’utilisateur s'engage lors de l'inscription à fournir des informations exactes et à maintenir confidentiels ses identifiants de connexion. L’utilisateur s’engage également à ne pas tenter de nuire au bon fonctionnement du site  inscription.salon-math.fr,  en respectant les règles d’utilisation du présent site. En cas de non-respect des règles ci-dessus, le compte enseignant·e de l’utilisateur sera supprimé et ses réservations annulées. ",
		"",
		"Tout contenu téléchargé se fait aux risques de l’utilisateur et sous son entière responsabilité. En conséquence, le présent site ne saurait être tenu responsable d’un quelconque dommage subi par l’ordinateur de l’utilisateur à la suite de ce téléchargement.  ",
		"",
		"En application de l’article 27 de la loi du 6 janvier 1978, les utilisateurs disposent d’un droit d’accès, de rectification, de modification et de suppression, des données personnelles qui les concernent. Il suffit d’en faire la demande auprès de l’association Animath.",
		"",
		"",
		"Article 5: Propriété intellectuelle ",
		"La structure générale, les logiciels, textes, images, vidéos, sons, et plus généralement toutes autres informations et contenus figurant dans le site inscription.salon-math.fr, sont la propriété d’Animath font l’objet d’une protection par le code de la protection intellectuelle et plus particulièrement soumis à la législation protégeant le droit d’auteur.",
		"",
		"",
		"Tout utilisateur doit solliciter une autorisation préalable du propriétaire pour toute reproduction, publication, copie des différents contenus et s'engage en cas d’accord à une utilisation des contenus du site dans un cadre strictement privé. Toute utilisation à des fins commerciales et publicitaires est strictement interdite.",
		"",
		"",
		"Toute représentation, modification, reproduction, dénaturation, totale ou partielle, de tout ou partie du site ou de son contenu, par quelques procédés que ce soit, et sur quelque support que ce soit constituerait une contrefaçon sanctionnée par les articles L 335-2 et suivants du Code de la Propriété Intellectuelle. II est également rappelé que conformément à l'article L122-5 du Code de propriété intellectuelle que l'utilisateur qui reproduit, copie ou publie le contenu protégé doit obligatoirement citer l'auteur et sa source.",
		"",
		"",
		"Article 6: Lien hypertexte et contenus intégrés ",
		"Les articles de ce site peuvent inclure des contenus intégrés, par exemple des vidéos, images, articles, liens hypertextes de sites extérieurs. L’association Animath ne peut être tenue responsable des éventuelles erreurs présentes sur ces sites. ",
		"",
		"",
		"Le contenu intégré depuis d’autres sites se comporte de la même manière que si le visiteur se rendait sur cet autre site. Ces sites web pourraient collecter des données sur vous, utiliser des cookies, embarquer des outils de suivis tiers, suivre vos interactions avec ces contenus embarqués si vous disposez d’un compte connecté sur leur site web. ",
		"Article 7: Cookies ",
		"L’utilisateur est informé que lors de ses visites sur le site, des cookies peuvent s’installer automatiquement sur son logiciel de navigation.",
		"",
		"Les cookies sont des blocs de données stockés temporairement sur le disque dur de l'ordinateur d’un utilisateur par leur navigateur qui ne permet pas de l’identifier, mais qui sert à enregistrer des informations relatives à la navigation de celui-ci. Les utilisateurs peuvent supprimer ces cookies grâce à des paramètres figurant au sein de son logiciel de navigation.",
		"",
		"En naviguant sur l’application, l'utilisateur accepte ces cookies.",
		"",
		"",
		"Article 8: Droit applicable et juridiction compétente",
		"La législation française s'applique à la présente charte. En cas d'absence de résolution amiable d'un litige, les tribunaux français seront donc seuls compétents pour le résoudre.",
		"",
		"Pour toute question relative à l'application des présentes conditions, nous vous invitons à joindre l'éditeur aux coordonnées mentionnées dans l’article premier.",
		""
	]
};



			  Swal.fire({
  title: 'Conditions générales d’utilisation',
  text: cgu['text'],
	width:"1500px",
})
		  }
      </script>

<?php
require('view_end.php')
?>
