<?php

class Controller_verify extends Controller
{
    public function action_verify()
    {
    //    if ($infos['active']){


  //      session_destroy();
   //     session_set_cookie_params('3600'); // 1 heure
   //     session_start();
   //     $_SESSION['Nom'] = $_POST['Nom'];
     //   $_SESSION['prenom'] = $_POST['Prenom'];
     //   $_SESSION['etablissement'] = $_POST['Etablissement'];
    //    $_SESSION['email'] = $_POST['email'];
   //     $_SESSION['ville'] = $_POST['Ville'];
   //     $_SESSION['id_classe'] = $infos['id_classe'];
   //     $_SESSION['is_open'] = TRUE;
   //     $data['nom'] = $_SESSION['Nom'];
   //     $data['prenom'] = $_SESSION['prenom'];
   //     $data['etablissement'] = $_SESSION['etablissement'];
   //     $data['email'] = $_SESSION['email'];
  //      $data['ville'] =  $_SESSION['ville'];
  //      $data['id_classe'] = $_SESSION['id_classe'];
   //         $this->render("home", $data);
      //  }
     //   else{
     //       $this->render("inscription", $data);
     //   }
     $this->render("verify", $data);
    }
    public function action_sendEmail(){
        $data['email'] = $_SESSION['email'];
        $data['nomcomp'] = $_SESSION['Nom'] . $_SESSION['prenom'];
        error_reporting(-1);
        ini_set('display_errors', 'On');
        set_error_handler("var_dump");
        include_once 'Utils/functions.php';
        send_activation_email($_SESSION['email'],$_SESSION['activation_code']);
        if (error_reporting(-1)){
            echo"<script type='text/javascript'>
            swal({
              title: 'Sucess',
              text: 'Le mail a été envoyé',
              type: 'sucess',
              button:'ok'
          }).then(function() {
            window.location = '?controller=verify';
        });
            </script> ";
            $this->render("verify", $data);
        }
        else {
            echo"<script type='text/javascript'>
            swal({
              title: 'Oopss',
              text: 'Erreur lors de l'envoie',
              type: 'error',
              button:'ok'
          }).then(function() {
            window.location = '?controller=verify';
        });
            </script> ";
            $this->render("verify", $data);
        }



    }
    public function action_verifyEmail()
    {
    include_once 'Utils/functions.php';

        $user = find_unverified_user($_SESSION['email'], $_SESSION['activation_code']);
        require_once('Models/Model.php');
        $v = Model::getModel();
        $id = $v->getIDfromEmail($_SESSION['email']);
        if ($v->Activate_user($id['id_user'])) {
          $data['is_activate'] = 1;
          $this->render("home_connected", $data);
        }
        else{
            $data = [
                'message' => "<script type='text/javascript'>
                      swal({
                        title: 'Oopss',
                        text: 'Problème lors de la validation (#token expire#), compte supprimer veuillez le recréer',
                        type: 'error',
                        button:'réessayer'
                    }).then(function() {
                      window.location = '?controller=inscription';
                  });
                      </script> ",
            ];
            session_write_close();
            session_destroy();
            $this->render('inscription_error', $data);
    }
  }

    public function action_default()
    {
        $this->action_verify();
    }
}

?>
