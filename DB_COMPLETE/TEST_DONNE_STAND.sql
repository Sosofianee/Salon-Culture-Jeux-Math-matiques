INSERT INTO do_user (nom,prenom,etablissement_user,ville,id_classe,email,password,category,active,activation_code,activation_expiry) 
VALUES ('Monsieur','zizi','YESSIR','Florida',NULL,'teststand@gmail.com','teststand','exposant',1,'zizizicacaca','2007-04-30 13:10:02.0474381');

INSERT INTO Stand(name,summary,id_user,capacity_stand,theme,recommended_level) VALUES
 ('Math & Magie','Tours de magie reussissant automatiquement grace aux maths et a la logique, susceptibles de motiver les eleves a s investir davantage en maths, et de montrer au grand public que les maths peuvent, aussi, etre un talent de societe.
',1,20,'Magie','Primaire, College, Lycee');

INSERT INTO Stand(name,summary,id_user,capacity_stand,theme,recommended_level) VALUES
 ('Art of Games','Jeux de société éducatifs ou de réflexion
',1,25,'Magie','Primaire, College, Lycee');
INSERT INTO data_stand(id_stand,start_temps_available,end_temps_available,date_available) VALUES (1,'09:00:00','09:20:00','2022-10-13');
INSERT INTO data_stand(id_stand,start_temps_available,end_temps_available,date_available) VALUES 
(2,'09:20:00','09:50:00','2022-10-13');
INSERT INTO data_stand(id_stand,start_temps_available,end_temps_available,date_available) VALUES 
(2,'10:00:00','10:10:00','2022-10-13');