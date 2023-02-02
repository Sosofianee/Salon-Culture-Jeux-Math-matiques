<?php

class Controller_myaccount extends Controller
{
    public function action_myaccount(){
        $m = Model::getModel();
        if(isset($_SESSION['id_user']['id_user'])){
            if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {



                $y = Model::getModel();
                $info = $m-> getAllInfofromID($_SESSION['id_user']['id_user']);
                $data['nom'] = $info['nom'];
                $data['prenom']=$info['prenom'];
                $data['ville']=$info['ville'];
                $data['etablissement_user']=$info['etablissement_user'];
                $this->render("myaccount", $data);
            }
        }
        else{
            $data['error'] = 'preview';
            $this->render("home", $data);
        }
    }

    public function action_planning(){
      $m = Model::getModel();
      if(isset($_SESSION['id_user']['id_user'])){
          if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {
              $reservation = $m->getReservationfromUser($_SESSION['id_user']['id_user']);
              if ($reservation) {


              $i = -1;
              foreach ($reservation as $key => $value) {
                  $i= $i + 1;
                  $array[$i] = $m->getDatastandfromIDData($value['id_data']);
              }
              $i = -1;
              foreach ($array as $key => $value) {
                      $i= $i + 1;
                      $dd = Model::getModel();
                      $data['horaire'][$i]['id'] = $value[0]['id_data'];
                         $titre = $dd->getNameStandfromnIDClear([$value[0]['id_stand']]);
                         $cap = $reservation[$i]['capacity'];
                          $data['horaire'][$i]['title'] = $titre['name'] . " :" . $cap ." Eleves";
                          if($value[0]['date_available'] =='Jeudi'){
                          $data['horaire'][$i]['start'] = '2023-05-25T' . $value[0]['start_temps_available'] ;
                          $data['horaire'][$i]['end'] = '2023-05-25T' . $value[0]['end_temps_available'] ;
                        }

                          if($value[0]['date_available'] =='Vendredi'){
                          $data['horaire'][$i]['start'] = '2023-05-26T' . $value[0]['start_temps_available']  ;
                          $data['horaire'][$i]['end'] = '2023-05-26T' . $value[0]['end_temps_available'] ;
                        }



              }

              $this->render("planning", $data);
          }
          else{
              $data['error'] = 'preview';
              $this->render("planning_empty", $data);
          }
          }
          else{
              $data['error'] = 'preview';
              $this->render("home", $data);
          }
        }
      }



    public function action_default()
    {
        $this->action_myaccount();
    }

}
?>
