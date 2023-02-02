
<?php

class Controller_connexion extends Controller
{
    public function action_login(){
        $data['error'] = 'not logged yet';
        $this->render("connexion", $data);
    }
    public function action_dologin()
    {
        $tt = Model::getModel();
        if ( isset($_POST['email']) && isset($_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            //tu traites les chaines, les securises logiquement etc... (pas pour l'exemple)
            $login = $_POST['email'];
            $mdp = $_POST['password'];
              $y = Model::getModel();
            // notre model ne sert qu'à vérifier en base si l'user existe.

            if ($y->userExist($login) ) {
                $pass = $y->getMdpfromEmail($login);
                if(password_verify($mdp, $pass['password'])){
                session_destroy();
                session_set_cookie_params('3600'); // 1 heure
                session_start();
                $_SESSION['id_user'] = $y->getIDfromEmail($login);
                $data['id_user'] = $_SESSION['id_user'];
                $active = $y->getActivefromEmail($login);
                $data['active'] = $active;
                $_SESSION['is_logged'] = true;
                $this->render("home_connected", $data);
            }
              else {
                $data['error'] =   "<script type='text/javascript'>
                swal({
                  title: 'Oopss',
                  text: 'Email ou Mot de passe Invalide',
                  type: 'error',
                  button:'réessayer'
                });
              </script> ";

              $this->render("connexion_error", $data);
              }
            }
            else {
                $data['error'] =   "<script type='text/javascript'>
                swal({
                  title: 'Oopss',
                  text: 'Email  Invalide',
                  type: 'error',
                  button:'réessayer'
                });
              </script> ";

              $this->render("connexion_error", $data);
            }
        }
        else {
            $data['error'] =   "<script type='text/javascript'>
            swal({
              title: 'Oopss',
              text: 'Entrée Invalide',
              type: 'error',
              button:'réessayer'
            });
          </script> ";

          $this->render("connexion_error", $data);
        }

    }

    public function action_default()
    {
        $this->action_login();
    }

}
