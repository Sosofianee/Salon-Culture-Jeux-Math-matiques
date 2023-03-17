UPDATE do_user
SET Email = 'mamdoudia@gmail.com'
WHERE name='Mamadou Diallo';

UPDATE Stand
SET theme = 'mathpasgay'
WHERE Name='test';

DELETE from data_stand
WHERE temps_available = '13:21:30' AND id_stand='2';