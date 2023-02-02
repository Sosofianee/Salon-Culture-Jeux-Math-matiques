
<?php

class Controller_forgot extends Controller
{
    public function action_forgot(){
        $data['error'] = 'not logged yet';
        $this->render("forgot", $data);
    }


    public function action_default()
    {
        $this->action_forgot();
    }

}
?>
