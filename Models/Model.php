<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        include "Utils/credentials.php";
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function test_unitaire(){
      $req = $this->bd->prepare('SELECT COUNT(*) FROM stand');
      $req->execute();
      $tab = $req->fetch(PDO::FETCH_NUM);
      return $tab[0];
    }
    public function getNameStand($id){
      $req = $this->bd->prepare('SELECT name FROM stand WHERE id_stand=:id');
      $req->bindValue(':id',$id);
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;

    }
    public function getIDStand($name){
      $req = $this->bd->prepare('SELECT id_stand FROM stand WHERE name=:name');
      $req->bindValue(':name',$name);
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;

    }
    public function getClassefromID($id){
      $req = $this->bd->prepare('SELECT id_classe FROM do_user WHERE id_user=:id');
      $req->bindValue(':id',$id);
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;

    }
    public function getNiveaufromID($id){
      $req = $this->bd->prepare('SELECT classe_level FROM niveau_classe WHERE id_classe=:id');
      $req->bindValue(':id',$id['id_classe']);
      $req->execute();
      $test = $req->fetchAll(PDO::FETCH_ASSOC);
      return $test;

    }
    public function getIDStandfromnName($name){
        $req = $this->bd->prepare('SELECT id_stand FROM stand WHERE name=:name');
        $req->bindValue(':name',$name);
        $req->execute();
        $test = $req->fetch(PDO::FETCH_ASSOC);
        return $test;

      }

      public function getNameStandfromnID($id){
        $req = $this->bd->prepare('SELECT name FROM stand WHERE id_stand=:id');
        $req->bindValue(':id',$id);
        $req->execute();
        $test = $req->fetch(PDO::FETCH_ASSOC);
        return $test;

      }
      public function getNameStandfromnIDClear($id){
        $req = $this->bd->prepare('SELECT name FROM stand WHERE id_stand=:id');
        $req->bindValue(':id',$id[0]);
        $req->execute();
        $test = $req->fetch(PDO::FETCH_ASSOC);
        return $test;

      }
      public function getAllfromIdData($id){
        $req = $this->bd->prepare('SELECT * FROM data_stand WHERE id_data=:id');
        $req->bindValue(':id',$id);
        $req->execute();
        $test = $req->fetch(PDO::FETCH_ASSOC);
        return $test;
      }
        public function Appendstand($stand_data){
      foreach ($stand_data as $key => $value) {
          $req = $this->bd->prepare('INSERT INTO Stand(name,summary,capacity_stand,allday,duree,intersection,nb_exposant_jeudi,nb_exposant_vendredi) VALUES (:name,:summary,:cap,:jour,:duree,:inter,:jeudi,:vendredi)');
          foreach ($value as $k => $v) {
              if($k == 'Nb max de visiteurs'){
                  $req->bindValue(':cap',$v);
                  echo 'ok';
              }
          elseif ($k == "Description de l'activité") {
              $req->bindValue(':summary',$v);
              echo 'ok';
          }
          elseif ($k == "Titre du stand") {
              $req->bindValue(':name',$v);
              echo 'ok';
          }
          elseif ($k == "9h - 18h") {
              if($v == 'oui'){
                  $v = TRUE;
                  $req->bindValue(':jour', $v);
                  echo 'ok';
              }

              else{
                  $v = FALSE;
                  $req->bindValue(':jour', $v);
                  echo 'ok';
              }

          }
          elseif ($k == "Temps intersession") {
              $req->bindValue(':inter', $v);
              echo 'ok';
          }
          elseif ($k == "Durée") {
              $req->bindValue(':duree', $v);
              echo 'ok';
          }
          elseif ($k == "jeudi") {
              if($v == '+'){
                  $v = NULL;
                  $req->bindValue(':jeudi', $v);
                  echo 'ok';
              }
              else{
                  $req->bindValue(':jeudi', $v);
              echo 'ok';
              }
          }
          elseif ($k == "vendredi") {
              if($v == '+'){
                  $v = NULL;
                  $req->bindValue(':vendredi', $v);
                  echo 'ok';
              }
              else{
                  $req->bindValue(':vendredi', $v);
                  echo 'ok';
              }
          }

      }

      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);

      }
    }
          public function Appenddata($stand_data){
      foreach ($stand_data as $key => $value) {

            $req2 = $this->bd->prepare('INSERT INTO data_stand(id_stand,start_temps_available,end_temps_available,date_available,is_available) VALUES (:id,:start,:end,:jj,TRUE)');
    if($value['9h - 18h']){

            if($value['la_jeudi'] == "Présent" && $value['la_vendredi'] == "Présent"){
                $jours["0"] = "Jeudi";
                var_dump($jours);
                foreach ($jours as $cle => $valeur) {
                    $req2->bindValue(':jj',$valeur);
                    $v = Model::getModel();
                    $id = $v->getIDStandfromnName($value['Titre du stand']);
                    var_dump($id);
                    $pass = NULL;
                    $req2->bindValue(':id',$id['id_stand']);
                    $j = new DateTime(date("H:i", strtotime($value['pause_start'])));
                    $f = new DateTime(date("H:i", strtotime($value['pause_end'])));
                    $debut = date("H:i", strtotime($value['pause_start']));
                    $fin = date("H:i", strtotime($value['pause_end']));
                    $interval = $f->diff($j);
                    $tt = hoursToMinutes($interval->format('%h:%i'));
                    $start = date('09:00');
                    $dd = $value['Durée'];
                    if($debut == $fin){
                        while (date('H:i', strtotime($start. " + $dd minutes")) <= "18:00") {
                            $end = date('H:i', strtotime($start. " + $dd minutes"));
                            $req2->bindValue(':end',$end);
                            if($value['Temps intersession'] != 0){
                                $dd = $value['Durée'];
                                $inter = $dd + $value['Temps intersession'];
                                $req2->bindValue(':start',$start);
                                $req2->execute();
                                $test = $req2->fetch(PDO::FETCH_ASSOC);
                                $start = date('H:i', strtotime($start. " + $inter minutes"));
                            }
                            elseif ($value['Temps intersession'] == 0) {
                                $req2->bindValue(':start',$start);
                                $req2->execute();
                                $test = $req2->fetch(PDO::FETCH_ASSOC);
                                $start = date('H:i', strtotime($start. " + $dd minutes"));

                            }
                        }

                        }

                    elseif ($debut != $fin) {
                        while (date('H:i', strtotime($start. " + $dd minutes")) <= "18:00") {
                            $ee = date('H:i', strtotime($start. " + $dd minutes"));
                            if (($start >= $debut && $start < $fin) || ($ee  >= $debut && $ee  < $fin))
                            {
                                $start = $fin;
                            }
                            else{
                            $end = date('H:i', strtotime($start. " + $dd minutes"));
                            $req2->bindValue(':end',$end);
                            if($start == $end){
                                $end = date('H:i', strtotime($start. " + $dd minutes"));
                            }
                            if($start <= $debut){

                                if($value['Temps intersession'] != 0){
                                    $dd = $value['Durée'];
                                    $inter = $dd + $value['Temps intersession'];
                                    $req2->bindValue(':start',$start);
                                    $req2->execute();
                                    $test = $req2->fetch(PDO::FETCH_ASSOC);
                                    $start = date('H:i', strtotime($start. " + $inter minutes"));
                                }
                                elseif ($value['Temps intersession'] == 0) {
                                    $req2->bindValue(':start',$start);
                                    $req2->execute();
                                    $test = $req2->fetch(PDO::FETCH_ASSOC);
                                    $start = date('H:i', strtotime($start. " + $dd minutes"));

                                }
                        }
                        elseif($end >= $debut  && $pass != $fin){
                            $pass = $fin;
                            $start = $fin;
                            $end = $fin;
                        }
                        if($start >= $debut && $start >= $fin){
                            if($value['Temps intersession'] != 0){
                                $dd = $value['Durée'];
                                $inter =  $dd + $value['Temps intersession'];
                                $req2->bindValue(':start',$start);
                                $req2->execute();
                                $test = $req2->fetch(PDO::FETCH_ASSOC);
                                $start = date('H:i', strtotime($start. " + $inter minutes"));
                            }
                            elseif ($value['Temps intersession'] == 0) {
                                $req2->bindValue(':start',$start);
                                $req2->execute();
                                $test = $req2->fetch(PDO::FETCH_ASSOC);
                                $start = date('H:i', strtotime($start. " + $dd minutes"));

                            }
                        }
                        elseif ($start >= $debut && $start <= "18:00") {
                            $done = 0;
                            $pass = null;
                        }
                        }
                    }
                    }
                }
            }
            if($value['la_jeudi'] == "Présent" && $value['la_vendredi'] != "Présent" ){
                $jouronlyjeudi = "Jeudi";
                $req2->bindValue(':jj',$jouronlyjeudi);
                $e = Model::getModel();
                $id = $e->getIDStandfromnName($value['Titre du stand']);
                $req2->bindValue(':id',$id['id_stand']);
                $j = new DateTime(date("H:i", strtotime($value['pause_start'])));
                $f = new DateTime(date("H:i", strtotime($value['pause_end'])));
                $debut = date("H:i", strtotime($value['pause_start']));
                $fin = date("H:i", strtotime($value['pause_end']));
                $interval = $f->diff($j);
                hoursToMinutes($interval->format('%h:%i'));
                $start = date('09:00');
                $dd = $value['Durée'];
                if($debut == $fin){
                    while (date('H:i', strtotime($start. " + $dd minutes")) <= "18:00") {
                        $end = date('H:i', strtotime($start. " + $dd minutes"));
                        $req2->bindValue(':end',$end);
                        if($value['Temps intersession'] != 0){
                            $dd = $value['Durée'];
                            $inter = $dd + $value['Temps intersession'];
                            $req2->bindValue(':start',$start);
                            $req2->execute();
                            $test = $req2->fetch(PDO::FETCH_ASSOC);
                            $start = date('H:i', strtotime($start. " + $inter minutes"));
                        }
                        elseif ($value['Temps intersession'] == 0) {
                            $req2->bindValue(':start',$start);
                            $req2->execute();
                            $test = $req2->fetch(PDO::FETCH_ASSOC);
                            $start = date('H:i', strtotime($start. " + $dd minutes"));

                        }
                    }

                    }

                elseif ($debut != $fin) {

                    while (date('H:i', strtotime($start. " + $dd minutes")) <= "18:00") {
                      $ee = date('H:i', strtotime($start. " + $dd minutes"));
                      if (($start >= $debut && $start < $fin) || ($ee  >= $debut && $ee  < $fin))
                        {
                            $start = $fin;
                        }
                        else{
                        $end = date('H:i', strtotime($start. " + $dd minutes"));
                        $req2->bindValue(':end',$end);
                        if($start == $end){
                            $end = date('H:i', strtotime($start. " + $dd minutes"));
                        }
                        if($start <= $debut){

                            if($value['Temps intersession'] != 0){
                                $dd = $value['Durée'];
                                $inter = $dd + $value['Temps intersession'];
                                $req2->bindValue(':start',$start);
                                $req2->execute();
                                $test = $req2->fetch(PDO::FETCH_ASSOC);
                                $start = date('H:i', strtotime($start. " + $inter minutes"));
                            }
                            elseif ($value['Temps intersession'] == 0) {
                                $req2->bindValue(':start',$start);
                                $req2->execute();
                                $test = $req2->fetch(PDO::FETCH_ASSOC);
                                $start = date('H:i', strtotime($start. " + $dd minutes"));

                            }
                    }
                    elseif($end >= $debut  && $pass != $fin){
                        $pass = $fin;
                        $start = $fin;
                        $end = $fin;
                    }
                    if($start >= $debut  && $start >= $fin){
                        if($value['Temps intersession'] != 0){
                            $dd = $value['Durée'];
                            $inter = $dd + $value['Temps intersession'];
                            $req2->bindValue(':start',$start);
                            $req2->execute();
                            $test = $req2->fetch(PDO::FETCH_ASSOC);
                            $start = date('H:i', strtotime($start. " + $inter minutes"));
                        }
                        elseif ($value['Temps intersession'] == 0) {
                            $req2->bindValue(':start',$start);
                            $req2->execute();
                            $test = $req2->fetch(PDO::FETCH_ASSOC);
                            $start = date('H:i', strtotime($start. " + $dd minutes"));

                        }
                    }
                    elseif ($start >= $debut && $start <= "18:00") {
                        $done = 0;
                        $pass = null;
                    }
                    }
                }
                }
            }
            if($value['la_vendredi'] == "Présent" && !$value['la_jeudi'] != "Présent" ){
                $jouronlyvendredi = "Vendredi";
                $req2->bindValue(':jj',$jouronlyvendredi);
                $b = Model::getModel();
                $id = $b->getIDStandfromnName($value['Titre du stand']);
                $req2->bindValue(':id',$id['id_stand']);
                $j = new DateTime(date("H:i", strtotime($value['pause_start'])));
                $f = new DateTime(date("H:i", strtotime($value['pause_end'])));
                $debut = date("H:i", strtotime($value['pause_start']));
                $fin = date("H:i", strtotime($value['pause_end']));
                $interval = $f->diff($j);
                hoursToMinutes($interval->format('%h:%i'));
                $start = date('09:00');
                $dd = $value['Durée'];
                if($debut == $fin){
                while (date('H:i', strtotime($start. " + $dd minutes")) <= "18:00") {
                    $end = date('H:i', strtotime($start. " + $dd minutes"));
                    $req2->bindValue(':end',$end);
                    if($value['Temps intersession'] != 0){
                        $dd = $value['Durée'];
                        $inter = $dd + $value['Temps intersession'];
                        $req2->bindValue(':start',$start);
                        $req2->execute();
                        $test = $req2->fetch(PDO::FETCH_ASSOC);
                        $start = date('H:i', strtotime($start. " + $inter minutes"));
                    }
                    elseif ($value['Temps intersession'] == 0) {
                        $req2->bindValue(':start',$start);
                        $req2->execute();
                        $test = $req2->fetch(PDO::FETCH_ASSOC);
                        $start = date('H:i', strtotime($start. " + $dd minutes"));

                    }
                }

                }

            elseif ($debut != $fin) {
                while (date('H:i', strtotime($start. " + $dd minutes")) <= "18:00") {
                  $ee = date('H:i', strtotime($start. " + $dd minutes"));
                  if (($start >= $debut && $start < $fin) || ($ee  >= $debut && $ee  < $fin))
                    {
                        $start = $fin;
                    }
                    else{
                    $end = date('H:i', strtotime($start. " + $dd minutes"));
                    $req2->bindValue(':end',$end);
                    if($start == $end){
                        $end = date('H:i', strtotime($start. " + $dd minutes"));
                    }
                    if($start <= $debut){

                        if($value['Temps intersession'] != 0){
                            $dd = $value['Durée'];
                            $inter = $dd + $value['Temps intersession'];
                            $req2->bindValue(':start',$start);
                            $req2->execute();
                            $test = $req2->fetch(PDO::FETCH_ASSOC);
                            $start = date('H:i', strtotime($start. " + $inter minutes"));
                        }
                        elseif ($value['Temps intersession'] == 0) {
                            $req2->bindValue(':start',$start);
                            $req2->execute();
                            $test = $req2->fetch(PDO::FETCH_ASSOC);
                            $start = date('H:i', strtotime($start. " + $dd minutes"));

                        }
                }
                elseif($end >= $debut  && $pass != $fin){
                    $pass = $fin;
                    $start = $fin;
                    $end = $fin;
                }
                if($start >= $debut && $start >= $fin){
                    if($value['Temps intersession'] != 0){
                        $dd = $value['Durée'];
                        $inter = $dd + $value['Temps intersession'];
                        $req2->bindValue(':start',$start);
                        $req2->execute();
                        $test = $req2->fetch(PDO::FETCH_ASSOC);
                        $start = date('H:i', strtotime($start. " + $inter minutes"));
                    }
                    elseif ($value['Temps intersession'] == 0) {
                        $req2->bindValue(':start',$start);
                        $req2->execute();
                        $test = $req2->fetch(PDO::FETCH_ASSOC);
                        $start = date('H:i', strtotime($start. " + $dd minutes"));

                    }
                }
                elseif ($start >= $debut && $start <= "18:00") {
                    $done = 0;
                    $pass = null;
                }
                }
            }
            }
        }
        }

    }
  }

      public function appendNiveau($stand_data){
      foreach ($stand_data as $key => $value) {

    $req2 = $this->bd->prepare('INSERT INTO niveau_recommande(recommended_level,id_stand) VALUES (:re,:id)');
        foreach ($value['nv_scol'] as $c => $valeur) {
            echo substr($valeur,0,1);
            $vee = trim($valeur);
            if(substr($vee,0,1) == 'C'){
                $valeur = 'college';
                $req2->bindValue(':re',$valeur);
            }
            if(substr($vee,0,1) == 'L'){
                $valeur = 'lycee';
                $req2->bindValue(':re',$valeur);
            }
            if(substr($vee,0,1) == 'P'){
                $valeur = 'primaire';
                $req2->bindValue(':re',$valeur);
            }
            $m = Model::getModel();
            $id = $m->getIDStandfromnName($value['Titre du stand']);
            var_dump($valeur);
            $req2->bindValue(':id',$id['id_stand']);
            $req2->execute();
            $test = $req2->fetch(PDO::FETCH_ASSOC);
            echo 'ok';
            }


}
}
    public function getDatastandfromID($id){
      $req = $this->bd->prepare('SELECT id_data,start_temps_available,end_temps_available,date_available,is_available FROM data_stand WHERE id_stand=:id');
      $req->bindValue(':id',$id['id_stand']);
      $req->execute();
      $test = $req->fetchAll(PDO::FETCH_ASSOC);
      return $test;

    }
    public function getAllstandfromID($id){
      $req = $this->bd->prepare('SELECT * FROM stand WHERE id_stand=:id ');
      $req->bindValue(':id',$id['id_stand']);
      $req->execute();
      $tab = $req->fetchAll(PDO::FETCH_ASSOC);
      return $tab;
    }
    public function getAllstandfromIDClear($id){
        $req = $this->bd->prepare('SELECT * FROM stand WHERE id_stand=:id ');
        $req->bindValue(':id',$id);
        $req->execute();
        $tab = $req->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
      }
    public function getAllDatastandfromID($id){
        $req = $this->bd->prepare('SELECT * FROM data_stand WHERE id_data=:id ');
        $req->bindValue(':id',$id);
        $req->execute();
        $tab = $req->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
      }
    public function getAllstandInfo(){
      $req = $this->bd->prepare('SELECT * FROM stand ORDER BY name ASC');
      $req->execute();
      $tab = $req->fetchAll(PDO::FETCH_ASSOC);
      return $tab;
    }

    public function getNameStandfromID($id){
      $req = $this->bd->prepare('SELECT name FROM stand WHERE id_stand=:id');
      $req->bindValue(':id',$id);
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;

    }
    public function getIDfromlastclasseCreated(){
      $req = $this->bd->prepare('SELECT new_row_data_classe FROM log_classe ORDER BY new_row_data_classe DESC
      LIMIT 1');
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;

    }
    public function getAllInfo(){
      $req = $this->bd->prepare('SELECT Name,Email,category FROM do_user');
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;
    }

    public function getAllName(){
      $req = $this->bd->prepare('SELECT Name FROM do_user');
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;
    }
    public function Filter($nv,$heureS,$Jour){
      $i = -1;
      foreach ($nv as $key => $value) {
        $i = $i +1;
        $tt = explode(':',$heureS);

        $tt[0] = $tt[0] ."%";
        $req = $this->bd->prepare("SELECT DISTINCT name,summary FROM Stand  INNER JOIN niveau_recommande ON Stand.id_stand = niveau_recommande.id_stand   INNER JOIN data_stand ON Stand.id_stand = data_stand.id_stand   WHERE  start_temps_available::text LIKE :S AND recommended_level=:nv
         AND date_available=:d AND is_available = TRUE ");
        $req->bindValue(':S',$tt[0]);
        $req->bindValue(':d',$Jour);
        $req->bindValue(':nv',$value);
        $req->execute();
        $test[$i] = $req->fetchAll(PDO::FETCH_ASSOC);

      }
      return $test;

    }
    public function addUser($infos){
      $req = $this->bd->prepare('INSERT INTO do_user (nom,prenom,etablissement_user,ville,id_classe,email,password,category,activation_code,activation_expiry) VALUES (:nom,:prenom,:etablissement,:ville,:id_classe,:email,:pass,:cat,:activation_code,:activation_expiry)');
      $req->bindValue(':nom',$infos['nom']);
      $req->bindValue(':prenom',$infos['prenom']);
      $req->bindValue(':etablissement',$infos['etablissement']);
      $req->bindValue(':ville',$infos['ville']);
      $req->bindValue(':activation_code', password_hash($infos['activation_code'], PASSWORD_DEFAULT));
      $req->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + 300));
      $id = substr($infos['id_classe']['new_row_data_classe'],1,1);
      $req->bindValue(':id_classe',$id);
      $req->bindValue(':email',$infos['email']);
      $req->bindValue(':pass',$infos['password']);
      $req->bindValue(':cat',$infos['category']);
      $req->execute();
      return $req->rowCount();
    }
    public function addClasse($infos_class){
      $req = $this->bd->prepare('INSERT INTO classe (classe_length,etablissement) VALUES (:class_length,:etablissement)');
      $req->bindValue(':class_length',$infos_class['class_length']);
      $req->bindValue(':etablissement',$infos_class['etablissement']);

      $req->execute();
      return $req->rowCount();
    }
    public function addNiveau($infos_class){
      foreach ($infos_class['classe_level'] as $key => $value) {
        $req = $this->bd->prepare('INSERT INTO Niveau_classe (classe_level,id_classe) VALUES (:classe_level,:id_classe)');
        $req->bindValue(':classe_level',$value);
        $id = substr($infos_class['id_classe']['new_row_data_classe'],1,1);
        $req->bindValue(':id_classe',$id);
        $req->execute();
      }
      return $req->rowCount();

    }
    public function addReservation($data){
          $req = $this->bd->prepare('INSERT INTO do_reservation(id_data,capacity,id_stand,id_user) VALUES (:id_data,:capacity,:id_stand,:id_user)');
          $req->bindValue(':id_data',$data['id_data']);
          $req->bindValue(':capacity',$data['capacity']);
          $req->bindValue(':id_stand',$data['id_stand']);
          $req->bindValue(':id_user',$data['id_user']);
          $req->execute();
        return $req->rowCount();

      }
      public function updateCreneaux($id){
        $req = $this->bd->prepare('UPDATE  data_stand set is_available=false where id_data=:id');
        $req->bindValue(':id',$id);
        $req->execute();
      return $req->rowCount();

    }

    public function getReservationfromUser($id){
      $req = $this->bd->prepare('SELECT id_data,capacity,id_user,id_stand FROM do_reservation WHERE id_user=:id');
      $req->bindValue(':id',$id);
      $req->execute();
      $test = $req->fetchAll(PDO::FETCH_ASSOC);
      return $test;
    }
    public function getDatastandfromIDData($id){
      $req = $this->bd->prepare('SELECT * FROM data_stand WHERE id_data=:id');
      $req->bindValue(':id',$id);
      $req->execute();
      $test = $req->fetchAll(PDO::FETCH_ASSOC);
      return $test;
    }
    public function IsAlreadyReserved($id){
      $req = $this->bd->prepare('SELECT * FROM do_reservation WHERE id_data=:id');
      $req->bindValue(':id',$id);
      $req->execute();
      return $req->rowCount();

    }
    public function getAllType(){
      $req = $this->bd->prepare('SELECT * FROM type_user');
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;
    }
    public function getAllFromNom($name){
      $req = $this->bd->prepare('SELECT * FROM do_user where nom=:nom');
      $req->bindValue(':nom',$name);
      $req->execute();
      return $req->rowCount();
    }
    public function getAllEmail(){
      $req = $this->bd->prepare('SELECT Email FROM do_user');
      $req->execute();
      $reponse = [];
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $reponse[] = $ligne['email'];
        }
        return $reponse;
    }
    public function getActivefromEmail($email){
      $req = $this->bd->prepare('SELECT active FROM do_user WHERE email=:email');
      $req->bindValue(':email',$email);
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;
    }
    public function getMdpfromEmail($email){
      $req = $this->bd->prepare('SELECT password FROM do_user WHERE email=:email');
      $req->bindValue(':email',$email);
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;
    }

    public function VerifyExpirationtoken($email){
      $sql = 'SELECT id_user, activation_code, activation_expiry < now() as expired
      FROM do_user
      WHERE active = 0 AND email=:email';

      $statement = $this->bd->prepare($sql);

     $statement->bindValue(':email', $email);
      $statement->execute();

     $user = $statement->fetch(PDO::FETCH_ASSOC);
      return $user;

    }
    public function DeleteUserByID(int $id, int $active = 0){
      $sql = 'DELETE FROM do_user
      WHERE id_user =:id and active=:active';

    $statement = $this->bd->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':active', $active, PDO::PARAM_INT);

    return $statement->execute();
    }
    public function Activate_user(int $id){
      $sql = 'UPDATE do_user
      SET active = 1
      WHERE id_user=:id';

    $statement = $this->bd->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    return $statement->execute();
    }
    public function getIDfromEmail($email){
      $req = $this->bd->prepare('SELECT id_user FROM do_user WHERE email=:email');
      $req->bindValue(':email', $email);
      $req->execute();
      $test = $req->fetch(PDO::FETCH_ASSOC);
      return $test;
  }
  public function getAllInfofromID($id){
    $req = $this->bd->prepare('SELECT nom,prenom,ville,etablissement_user,id_user,id_classe,category FROM do_user where id_user=:id');
    $req->bindValue(':id',$id);
    $req->execute();
    $test = $req->fetch(PDO::FETCH_ASSOC);
    return $test;
  }
  public function isActive($id){
    $req = $this->bd->prepare('SELECT active FROM do_user where id_user=:id');
    $req->bindValue(':id',$id);
    $req->execute();
    $test = $req->fetch(PDO::FETCH_NUM);
    return $test;
  }
  public function userExist($email){
    $req = $this->bd->prepare('SELECT active FROM do_user where  email=:email');
    $req->bindValue(':email',$email);
    $req->execute();
    $test = $req->fetch(PDO::FETCH_ASSOC);
    return $test;
  }
  public function getpassfromEmail($email){
    $req = $this->bd->prepare('SELECT password FROM do_user where  email=:email');
    $req->bindValue(':email',$email);
    $req->execute();
    $test = $req->fetch(PDO::FETCH_ASSOC);
    return $test;
  }
}
?>
