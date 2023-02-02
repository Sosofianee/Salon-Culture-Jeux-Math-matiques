
<?php

class Controller_append_database extends Controller
{
    public function action_append_database(){
      $strJsonFileContents = file_get_contents("Utils/Export - IUT.json");
      $array = json_decode($strJsonFileContents, true);
      header('Content-type: text/html; charset=UTF-8');
      $stand_data = [];
      $i=0;
      foreach ($array['Import'] as $key => $value) {
        $i+=1;
        foreach ($value as $k => $v) {
                if($k == 'Nb max de visiteurs'){
                    $stand_data[$i]['Nb max de visiteurs'] = $v ;
        }
            if ($k == "Description de l'activité") {
                $stand_data[$i]["Description de l'activité"] = $v ;
            }
            if ($k == "Titre du stand") {
                $stand_data[$i]["Titre du stand"] = $v ;
            }
            if ($k == "9h - 18h") {
                $stand_data[$i]["9h - 18h"] = $v ;
            }
            if ($k == "Temps intersession") {
                $stand_data[$i]["Temps intersession"] = $v ;
            }
            if ($k == "Durée") {
                $stand_data[$i]["Durée"] = $v ;
            }
            if ($k == "Nombre d'animateurs par jour  [jeudi]") {
                $stand_data[$i]["jeudi"] = $v ;
            }
            if ($k == "Nombre d'animateurs par jour  [vendredi]") {
                $stand_data[$i]["vendredi"] = $v ;
            }
            if ($k == "Pause déjeuner - début") {
                $stand_data[$i]["pause_start"] = $v ;
            }
            if ($k == "Pause déjeuner - fin") {
                $stand_data[$i]["pause_end"] = $v ;
            }
            if ($k == "Niveaux des visiteurs scolaires") {
                $nv = explode(",",$v);
                $stand_data[$i]["nv_scol"] = $nv ;
            }
            if ($k == "Vous serez présent [Jeudi 25 mai]") {

                $stand_data[$i]["la_jeudi"] = $v ;
            }
            if ($k == "Vous serez présent [Vendredi 26 mai]") {

                $stand_data[$i]["la_vendredi"] = $v ;
            }
      }
      }
        $v = Model::getModel();
        $test1 = $v->Appendstand($stand_data);
        $test2 = $v->Appenddata($stand_data);
        $test3 = $v->appendNiveau($stand_data);
        if($test1 == TRUE && $test2 == TRUE && $test3 == TRUE){
          $data['ok'] = 'ok';
        }
        else{
          $data['ok'] = 'not ok';
        }
        $this->render("databasecheck", $data);
    }


    public function action_default()
    {
        $this->action_append_database();
    }

}
?>
