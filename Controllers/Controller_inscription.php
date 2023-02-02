<?php

class Controller_inscription extends Controller
{
  public function action_inscription()
  {
      $m = Model::getModel();
      $data = [
          "liste" => 'none',
      ];
      $this->render("inscription", $data);
  }

  public function action_default()
    {
        $this->action_inscription();
    }
    public function action_add_user()
    {
      $data = false;

      $y = Model::getModel();
      $ggt =  $y->getAllEmail();
      $email = [];
      foreach ($ggt as $key => $value) {
        array_push($email , $value);
      }
      $test = htmlspecialchars($_POST['email'], ENT_QUOTES);
      if(! in_array($_POST['email'], $email)){
        if(isset($_POST['Nom'])  and  isset($_POST['Prenom']) and isset($_POST['Etablissement'])  and isset($_POST['Ville']) and isset($_POST['email']) and
        isset($_POST['password']) and isset($_POST['password2']) and isset($_POST['rad']) and $_POST['num_eleve'] !== 0
      )
        {
              $infos = [];
              $infos_class = [];
              if (! trim($_POST['Nom']) == '' and preg_match("/^[a-zA-Z]+$/", $_POST["Nom"]) ){
                $infos['nom'] = $_POST['Nom'];
              }
              else{

                $vue = 'inscription_error';
                $error =  "<script type='text/javascript'>
                swal({
                  title: 'Oopss',
                  text: 'Le Nom est invalide !',
                  type: 'error',
                  button:'réessayer'
                }).then(function() {
                  window.location = '?controller=inscription';
              });
              </script> ";
              $this->action_error($error,$vue);
              die();
              }
              if (! trim($_POST['Prenom']) == '' and preg_match("/^[a-zA-Z]+$/", $_POST["Prenom"]) ){
                $infos['prenom'] = $_POST['Prenom'];
              }
              else{

                $vue = 'inscription_error';
                $error =  "<script type='text/javascript'>
                swal({
                  title: 'Oopss',
                  text: 'Le Prenom est invalide !',
                  type: 'error',
                  button:'réessayer'
                }).then(function() {
                  window.location = '?controller=inscription';
              });
              </script> ";
              $this->action_error($error,$vue);
              die();
              }
              if (! trim($_POST['Ville']) == '' and preg_match('/^[a-zA-Z\s]+$/', $_POST["Ville"]) ){
                $infos['ville'] = $_POST['Ville'];
              }
              else{

                $vue = 'inscription_error';
                $error =   "<script type='text/javascript'>
                swal({
                  title: 'Oopss',
                  text: 'La Ville est invalide !',
                  type: 'error',
                  button:'réessayer'
                }).then(function() {
                  window.location = '?controller=inscription';
              });
              </script> ";
              $this->action_error($error,$vue);
              die();
              }
              if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) and  $_POST['password'] !== $_POST['password2'] ){
                $vue = 'inscription_error';
                $error =  "<script type='text/javascript'>
                swal({
                  title: 'WTFFF',
                  text: 'Are you a boomer !??',
                  type: 'error',
                  button:'réessayer'
              }).then(function() {
                window.location = '?controller=inscription';
            });
              </script> ";
              $this->action_error($error,$vue);
              die();
              }
              if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $infos['email'] = $_POST['email'];

              }
              else{

                $vue = 'inscription_error';
                $error =  "<script type='text/javascript'>
                swal({
                  title: 'Oopss',
                  text: 'Email invalide !',
                  type: 'error',
                  button:'réessayer'
              }).then(function() {
                window.location = '?controller=inscription';
            });
              </script> ";
              $this->action_error($error,$vue);
              die();
            }
            if( $_POST['password'] == $_POST['password2'] and trim($_POST['password2']) != ""
              and trim($_POST['password']) != ""  ){

              $options = [
                'cost' => 12,
              ];
              $infos['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);;
            }
            else{
              $vue = 'inscription_error';
              $error = "<script type='text/javascript'>
              swal({
                title: 'Oopss',
                text: 'Password didnt match',
                type: 'error',
                button:'réessayer'
            }).then(function() {
              window.location = '?controller=inscription';
          });
           </script>";
              $this->action_error($error,$vue);
              die();
            }

              $infos['category'] = 'visiteur';
              $infos['etablissement'] = $_POST['Etablissement'];
              $infos['activation_code'] = bin2hex(random_bytes(16));
              $infos_class['classe_level'] = $_POST['rad'];
              $infos_class['class_length'] = $_POST['num_eleve'];
              $infos_class['etablissement'] = $_POST['Etablissement'];



              require_once('Models/Model.php');
              $v = Model::getModel();
              $ttt =  $v->addClasse($infos_class);
              $id = $v->getIDfromlastclasseCreated();
              $infos['id_classe'] = $id;
              $infos_class['id_classe'] = $id;
              $tt =  $v->addUser($infos);
              $tttt = $v->addNiveau($infos_class);
              $em = $infos['email'];
              $nomcomp = $infos['nom'] ."  ". $infos['prenom'];
              session_destroy();
              session_set_cookie_params('3600'); // 1 heure
              session_start();
              $_SESSION['activation_code'] = $infos['activation_code'];
              $_SESSION['Nom'] = $_POST['Nom'];
              $_SESSION['prenom'] = $_POST['Prenom'];
              $_SESSION['etablissement'] = $_POST['Etablissement'];
              $_SESSION['email'] = $_POST['email'];
              $_SESSION['ville'] = $_POST['Ville'];
              $_SESSION['id_classe'] = $infos['id_classe'];
              $_SESSION['id_user'] = $v->getIDfromEmail($em);
              $data['nom'] = $_SESSION['Nom'];
              $data['prenom'] = $_SESSION['prenom'];
              $data['etablissement'] = $_SESSION['etablissement'];
              $data['email'] = $_SESSION['email'];
              $data['ville'] =  $_SESSION['ville'];
              $data['id_classe'] = $_SESSION['id_classe'];
              $data['id_user'] = $_SESSION['id_user'];
              $active = $v->getActivefromEmail($em);
              $data['active'] = $active;
              $data['activation_code'] = $_SESSION['activation_code'];
              $data['nomcomp'] = $nomcomp;
              if ($tt and $ttt and $tttt){
                require_once 'Utils/functions.php';
                $this->render("verify", $data);
              }
              else{
                echo "<p>ERORR" . $tt. "</p>";
              }
            }
          else{
            $vue = 'inscription_error';
              $error =  "<script type='text/javascript'>
                    swal({
                      title: 'Oopss',
                      text: 'An error as been detected',
                      type: 'error',
                      button:'réessayer'
                  }).then(function() {
                    window.location = '?controller=inscription';
                });
                    </script> ";
                    $this->action_error($error,$vue);
              die();
          }
          }
      else {
        $vue = 'inscription_error';
        $error =  "<script type='text/javascript'>
        swal({
          title: 'Oopss',
          text: 'Email already used',
          type: 'error',
          button:'réessayer'
      }).then(function() {
        window.location = '?controller=inscription';
    });
        </script> ";
        $this->action_error($error,$vue);
              die();
      }
    }

  }
 ?>


