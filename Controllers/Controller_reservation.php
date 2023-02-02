<?php

class Controller_reservation extends Controller
{
    public function action_reservation(){
        $m = Model::getModel();
        if(isset($_SESSION['id_user']['id_user'])){
            if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {
                $classe = $m->getClassefromID($_SESSION['id_user']['id_user']);
                $nv = $m->getNiveaufromID($classe); 
                foreach ($nv as $key => $value) {
                    if($value['classe_level']=='primaire'){
                    $data['nv1'] = 'checked';
                    }
                    elseif ($value['classe_level']=='college') {
                        $data['nv2'] = 'checked';
                    }
                    elseif ($value['classe_level']=='lycee') {
                        $data['nv3'] = 'checked';
                    }
                }
                $data['data'] = $m->getAllstandInfo();
                $this->render("reservation", $data);
            }
        }
        else{
            $data['error'] = 'preview';
            $this->render("home", $data);
        }
    }
    public function action_search_stand(){
        $m = Model::getModel();
        if(isset($_SESSION['id_user']['id_user'])){
            if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {
                if(isset($_POST['temps_start'])  && isset($_POST['niveau']) && isset($_POST['Jour'])){
                    $_POST['temps_start'] = $_POST['temps_start'] .':00';
                    $data = $m->Filter($_POST['niveau'],$_POST['temps_start'],$_POST['Jour']);
                    $this->render("reservation_search", $data);
                }
                else{
                    echo 'error';
                    $data['none'] ='none';
                    $this->render("reservation", $data);
                }
            }
        }

    }
    public function action_show_reservation(){
        $m = Model::getModel();
        if(isset($_SESSION['id_user']['id_user'])){
            if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {
                $id = $m->getIDStand(urldecode($_GET['name']));
                $data['stand'] = $m->getAllstandfromID($id);
                $array = $m->getDatastandfromID($id);
                $i = -1;
                foreach ($array as $key => $value) {
                        $i= $i + 1;
                        $data['horaire'][$i]['id'] = $value['id_data'];
                        if($value['is_available'] == TRUE){
                            $data['horaire'][$i]['title'] = 'Disponible';
                            }
                            elseif ($value['is_available'] == FALSE) {
                                $data['horaire'][$i]['title'] = 'Indisponible';
                                $data['horaire'][$i]['color'] = '#F47174';
                            }

                        if ($value['date_available'] == 'Jeudi') {
                            $data['horaire'][$i]['start'] = '2023-05-25T' . $value['start_temps_available']  ;
                            $data['horaire'][$i]['end'] = '2023-05-25T' . $value['end_temps_available'] ;
                        }
                        elseif ($value['date_available'] == 'Vendredi')  {
                            $data['horaire'][$i]['start'] = '2023-05-26T' . $value['start_temps_available']  ;
                            $data['horaire'][$i]['end'] = '2023-05-26T' . $value['end_temps_available'] ;
                        }


                }
                $this->render("stand", $data);
            }
            else{
                $data['error'] = 'preview';
                $this->render("home", $data);
            }

            }
        }
    public function action_do_reservation(){
        $m = Model::getModel();
        if(isset($_SESSION['id_user']['id_user'])){
            if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {
                $data['error'] = 'preview';
                $data['heure'] = $m->getAllDatastandfromID($_GET['id']);
                $data['data'] = $m->getAllstandfromIDClear($data['heure'][0]['id_stand']);

                $this->render("do_reservation", $data);
            }
        }
    }
    public function action_add_reservation(){
        $m = Model::getModel();
        if(isset($_SESSION['id_user']['id_user'])){
            if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {
                echo "ok";
                $all = $m->getAllDatastandfromID($_GET['id']);
                $data['data'] = $m->getAllstandfromIDClear($all[0]['id_stand']);

                if(!$m->IsAlreadyReserved($all[0]['id_data'])){
                    $app['id_data'] = $all[0]['id_data'];
                    $app['capacity'] = $_POST['cap'];
                    $app['id_user'] = $_SESSION['id_user']['id_user'];
                    $app['id_stand'] = $all[0]['id_stand'];
                    var_dump($app);
                    $valid = $m->addReservation($app);
                    if($valid){
                        $m->updateCreneaux($app['id_data']);
                    }
                    else{
                        echo 'not OK';
                        $this->render("confirmed", $data);
                    }

                    echo 'OK';
                    $this->render("confirmed", $data);
                }
                else{
                    echo ' VERY not OK';
                    $this->render("confirmed", $data);
                }
            }
        }
        else{
            echo 'wif';
            $this->render("confirmed", $data);
        }
    }
    public function action_default()
    {
        $this->action_reservation();
    }

}
?>
