<?php

class Controller_deconnexion extends Controller
{
    public function action_deconnexion()
    {
            $_SESSION['intialized'] = 'This will not print';
            $_SESSION = array(); // Vide la session
            session_destroy(); 
            $data = [
                "nb" => 'none', // Vide
            ];
            $this->render("home", $data);
        }
        
    

    public function action_default()
    {
        $this->action_deconnexion();
    }
}

?>