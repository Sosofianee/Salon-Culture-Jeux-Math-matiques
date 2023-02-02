<?php

class Controller_home extends Controller
{
    public function action_home()
    {
        $m = Model::getModel();
        if(isset($_SESSION['id_user']['id_user'])){
            if (session_status() !== PHP_SESSION_NONE and $m->isActive($_SESSION['id_user']['id_user']) ) {
            $data = [
                "nb" => 'none',
            ];
            $this->render("home_connected", $data);
        }
        else{
            $data = [
                "nb" => 'none',
            ];
            $this->render("home", $data);
        }
        }
        else{
            $data = [
                "nb" => 'none',
            ];
            $this->render("home", $data);
        }

    }

    public function action_default()
    {
        $this->action_home();
    }
}
