DROP TABLE IF EXISTS Niveau_recommande,Niveau_classe,Classe,do_user,do_reservation,Stand,role,Log_user,Log_classe,Log_stand,Log_reservation,data_stand,log_data_stand CASCADE;
DROP SEQUENCE IF EXISTS do_reservation_id_resrvation_seq,do_reservation_id_stand_seq,do_reservation_id_user_seq,do_user_id_class_seq,do_user_id_user_seq,stand_id_stand_seq,stand_id_user_seq
,Log_user_id_user_seq,Log_user_token_log_user_seq,Log_class_token_log_class_seq,Log_stand_id_stand_seq,Log_stand_token_log_stand_seq,Log_stand_id_user_seq,Log_reservation_id_reservation_seq,Log_reservation_token_log_reservation_seq ;

CREATE TABLE role(
    category VARCHAR(128) NOT NULL,
    PRIMARY KEY (category)
);
INSERT INTO role VALUES('exposant');
INSERT INTO role VALUES('superviseur');
INSERT INTO role VALUES('visiteur');

CREATE TABLE Classe(
  id_classe SERIAL NOT NULL,
  classe_length integer NOT NULL,
  Etablissement varchar(50) NOT NULL,
  PRIMARY KEY (id_classe)
);
CREATE TABLE Niveau_classe(
  classe_level varchar(30) NOT NULL,
  id_classe integer NOT NULL

);
CREATE TABLE Log_classe(
  old_row_data_classe varchar(200),
  new_row_data_classe varchar(200),
  dml_type_classe varchar(30) NOT NULL,
  dml_timestamp_classe timestamp NOT NULL

);

CREATE TABLE do_user(
    Nom varchar(50) NOT NULL,
    Prenom varchar(50) NOT NULL,
    Ville varchar(50) NOT NULL,
    Etablissement_user varchar(50) ,
    id_user SERIAL NOT NULL,
    id_classe integer,
    Email varchar(50) NOT NULL,
    Password varchar(1200) NOT NULL,
    category VARCHAR(128) NOT NULL,
    active   integer DEFAULT 0,
    activation_code varchar(255),
    activation_expiry timestamp,
    PRIMARY KEY (id_user)
);
CREATE TABLE  log_user (
    old_row_data varchar(300),
    new_row_data varchar(300),
    dml_type varchar(30) NOT NULL,
    dml_timestamp timestamp NOT NULL

);
CREATE TABLE Stand(
  id_stand SERIAL NOT NULL,
  Name varchar(50) NOT NULL,
  summary varchar(500),
  capacity_stand integer NOT NULL,
  allday integer DEFAULT 0,
  duree integer NOT NULL,
  intersection integer NOT NULL,
  nb_exposant_jeudi integer ,
  nb_exposant_vendredi integer,
  PRIMARY KEY (id_stand)
);
CREATE TABLE Niveau_recommande(
  recommended_level varchar(30) NOT NULL,
  id_stand integer NOT NULL

);
CREATE TABLE Log_Stand(
   old_row_data_stand varchar(1000),
   new_row_data_stand varchar(1000),
   dml_type_stand varchar(30) NOT NULL,
   dml_timestamp_stand timestamp NOT NULL

);
CREATE TABLE do_reservation(
    id_reservation SERIAL NOT NULL,
    id_data integer NOT NULL,
    capacity integer NOT NULL,
    id_user integer NOT NULL,
    id_stand integer NOT NULL,
    PRIMARY KEY (id_reservation)
);
CREATE TABLE Log_reservation(
  old_row_data_reservation varchar(550),
  new_row_data_reservation varchar(550),
  dml_type_reservation varchar(30) NOT NULL,
  dml_timestamp_reservation timestamp NOT NULL

);

CREATE TABLE data_stand(
  id_data SERIAL NOT NULL,
	id_stand integer NOT NULL,
	start_temps_available time NOT NULL,
  end_temps_available time NOT NULL,
	date_available varchar(30) NOT NULL,
  is_available boolean NOT NULL,
  PRIMARY KEY (id_data)
);
CREATE TABLE Log_data_stand(
  old_row_data_datastand varchar(800),
  new_row_data_datastand varchar(800),
  dml_type_datastand varchar(30) NOT NULL,
  dml_timestamp_datastand timestamp NOT NULL
);

ALTER TABLE do_user ADD FOREIGN KEY (id_classe) REFERENCES Classe(id_classe);
ALTER TABLE data_stand ADD FOREIGN KEY (id_stand) REFERENCES Stand(id_stand);
ALTER TABLE do_reservation ADD FOREIGN KEY (id_user) REFERENCES do_user(id_user);
ALTER TABLE do_reservation ADD FOREIGN KEY (id_stand) REFERENCES Stand(id_stand);
ALTER TABLE do_reservation ADD FOREIGN KEY (id_data) REFERENCES data_stand(id_data);
ALTER TABLE Niveau_classe ADD FOREIGN KEY (id_classe) REFERENCES Classe(id_classe);
ALTER TABLE Niveau_recommande ADD FOREIGN KEY (id_stand) REFERENCES Stand(id_stand);