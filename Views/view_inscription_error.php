<?php
require('view_begin.php')
?>
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
            <div class="scale"><p class="select"> Selectionnez le niveau de votre classe :</p>
            <label class="rad-label">
    <input type="radio" class="rad-input" value='primaire' name="rad">
    <div class="rad-design"></div>
    <div class="rad-text">Primaire</div>
  </label>

  <label class="rad-label">
    <input type="radio" class="rad-input" value='college' name="rad">
    <div class="rad-design"></div>
    <div class="rad-text">College</div>
  </label>

  <label class="rad-label">
    <input type="radio" class="rad-input" value='lycee' name="rad">
    <div class="rad-design"></div>
    <div class="rad-text">Lycee</div>
  </label>

  <label class="rad-label">
    <input type="radio" class="rad-input" value='superieur' name="rad">
    <div class="rad-design"></div>
    <div class="rad-text">Superieur</div>
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
          <p class='cgu'>En cliquant sur S’inscrire, vous acceptez nos <a href='#'> Conditions générales</a>.</p>
          <input type="submit" name="signup_submit" value="S'inscrire" onclick="customAlert.alert('This is a custom alert without heading.')"/>
          
          </form>

          
        </div>
      </main>

<?php
echo $message;
require('view_end.php')
?>