

CREATE OR REPLACE FUNCTION get_login (pattern VARCHAR) RETURNS TABLE (
        Email_user VARCHAR,
        Pass_user VARCHAR
) AS $$
BEGIN
    RETURN QUERY SELECT
        Email,
        Password
    FROM
        do_user
    WHERE
        Name = pattern ;
END ; $$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION get_summary (pattern VARCHAR) RETURNS TABLE (
        Email_user VARCHAR,
        Pass_user VARCHAR
) AS $$
BEGIN
    RETURN QUERY SELECT
        summary,
        theme
    FROM
        Stand
    WHERE
        id_stand = pattern ;
END ; $$
LANGUAGE 'plpgsql';
























CREATE OR REPLACE FUNCTION user_do_trigger_func()
RETURNS trigger AS $body$
BEGIN
   if (TG_OP = 'INSERT') then
       INSERT INTO log_user (
           old_row_data,
           new_row_data,
           dml_type,
           dml_timestamp
       )
       VALUES(
           null,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'UPDATE') then
       INSERT INTO log_user (
           old_row_data,
           new_row_data,
           dml_type,
           dml_timestamp
       )
       VALUES(
           OLD,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'DELETE') then
       INSERT INTO log_user (
           old_row_data,
           new_row_data,
           dml_type,
           dml_timestamp,
           dml_created_by
       )
       VALUES(
           OLD,
           null,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN OLD;
   end if;

END;
$body$
LANGUAGE 'plpgsql';

CREATE TRIGGER user_do_trigger
AFTER INSERT OR UPDATE OR DELETE ON do_user
FOR EACH ROW EXECUTE PROCEDURE user_do_trigger_func();

CREATE OR REPLACE FUNCTION stand_do_trigger_func()
RETURNS trigger AS $body$
BEGIN
   if (TG_OP = 'INSERT') then
       INSERT INTO Log_stand (
           old_row_data_stand,
           new_row_data_stand,
           dml_type_stand,
           dml_timestamp_stand
       )
       VALUES(
           null,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'UPDATE') then
       INSERT INTO Log_stand (
           old_row_data_stand,
           new_row_data_stand,
           dml_type_stand,
           dml_timestamp_stand
       )
       VALUES(
           OLD,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'DELETE') then
       INSERT INTO Log_stand (
           old_row_data_stand,
           new_row_data_stand,
           dml_type_stand,
           dml_timestamp_stand
       )
       VALUES(
           OLD,
           null,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN OLD;
   end if;

END;
$body$
LANGUAGE 'plpgsql';

CREATE TRIGGER stand_do_trigger
AFTER INSERT OR UPDATE OR DELETE ON Stand
FOR EACH ROW EXECUTE PROCEDURE stand_do_trigger_func();


CREATE OR REPLACE FUNCTION classe_do_trigger_func()
RETURNS trigger AS $body$
BEGIN
   if (TG_OP = 'INSERT') then
       INSERT INTO log_classe (
           old_row_data_classe,
           new_row_data_classe,
           dml_type_classe,
           dml_timestamp_classe
       )
       VALUES(
           null,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'UPDATE') then
       INSERT INTO log_classe (
           old_row_data_classe,
           new_row_data_classe,
           dml_type_classe,
           dml_timestamp_classe
       )
       VALUES(
           OLD,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'DELETE') then
       INSERT INTO log_classe (
           old_row_data_classe,
           new_row_data_classe,
           dml_type_classe,
           dml_timestamp_classe
       )
       VALUES(
           OLD,
           null,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN OLD;
   end if;

END;
$body$
LANGUAGE 'plpgsql';

CREATE TRIGGER classe_do_trigger
AFTER INSERT OR UPDATE OR DELETE ON classe
FOR EACH ROW EXECUTE PROCEDURE classe_do_trigger_func();

CREATE OR REPLACE FUNCTION reservation_do_trigger_func()
RETURNS trigger AS $body$
BEGIN
   if (TG_OP = 'INSERT') then
       INSERT INTO Log_reservation (
           old_row_data_reservation,
           new_row_data_reservation,
           dml_type_reservation,
           dml_timestamp_reservation
       )
       VALUES(
           null,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'UPDATE') then
       INSERT INTO Log_reservation (
           old_row_data_reservation,
           new_row_data_reservation,
           dml_type_reservation,
           dml_timestamp_reservation
       )
       VALUES(
           OLD,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'DELETE') then
       INSERT INTO Log_reservation (
           old_row_data_reservation,
           new_row_data_reservation,
           dml_type_reservation,
           dml_timestamp_reservation
       )
       VALUES(
           OLD,
           null,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN OLD;
   end if;

END;
$body$
LANGUAGE 'plpgsql';

CREATE TRIGGER reservation_do_trigger
AFTER INSERT OR UPDATE OR DELETE ON do_reservation
FOR EACH ROW EXECUTE PROCEDURE reservation_do_trigger_func();

CREATE OR REPLACE FUNCTION datastand_do_trigger_func()
RETURNS trigger AS $body$
BEGIN
   if (TG_OP = 'INSERT') then
       INSERT INTO Log_data_stand (
           old_row_data_datastand,
           new_row_data_datastand,
           dml_type_datastand,
           dml_timestamp_datastand
       )
       VALUES(
           null,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN NEW;
   elsif (TG_OP = 'UPDATE') then
       INSERT INTO Log_data_stand (
           old_row_data_datastand,
           new_row_data_datastand,
           dml_type_datastand,
           dml_timestamp_datastand
       )
       VALUES(
           OLD,
           NEW,
           TG_OP,
           CURRENT_TIMESTAMP
       );
       RETURN NEW;
   elsif (TG_OP = 'DELETE') then
       INSERT INTO Log_data_stand (
           old_row_data_datastand,
           new_row_data_datastand,
           dml_type_datastand,
           dml_timestamp_datastand
       )
       VALUES(
           OLD,
           null,
           TG_OP,
           CURRENT_TIMESTAMP
       );

       RETURN OLD;
   end if;

END;
$body$
LANGUAGE 'plpgsql';

CREATE TRIGGER datastand_do_trigger
AFTER INSERT OR UPDATE OR DELETE ON data_stand
FOR EACH ROW EXECUTE PROCEDURE datastand_do_trigger_func();
