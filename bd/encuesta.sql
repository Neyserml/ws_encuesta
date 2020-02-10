DROP TABLE IF EXISTS db_encuesta;
CREATE DATABASE IF NOT EXISTS db_encuesta;
use db_encuesta;

CREATE TABLE user(
 dni varchar(20) not null,
 names varchar(100) not null,
 lastname varchar(100) not null,
 password text not null,
 created_at timestamp null default now(),
 primary key (dni)
);

INSERT INTO user(dni,names,lastname,password) values('48235319','Neyser','Marquina Lozano','48235319'),
													('90990909','Juan','Lopez Contreras','90990909');
select *from user;
CREATE TABLE surveys_questions (
q_id int NOT NULL auto_increment,
q_nro varchar(50) null,
q_description text default NULL,
q_created_at timestamp null default now(),
PRIMARY KEY  (q_id)
);
INSERT INTO surveys_questions(q_nro,q_description) VALUES ('1','¿Desde cuando es usted Cliente?'),
													('2','¿Cómo nos conoció?'),
                                                    ('3','¿Utiliza los productos de aver en la actividad diaria de la empresa?'),
                                                    ('4','Cuál es el grado de satisfacción con los productos');

select *from surveys_questions;
CREATE TABLE surveys_options (
o_id int NOT NULL auto_increment,
q_id int NOT NULL,
o_description text default NULL,
o_created_at timestamp null default now(),
PRIMARY KEY  (o_id),
foreign key(q_id) references surveys_questions(q_id)
);

INSERT INTO surveys_options(q_id,o_description) VALUES(1,'Menos de un año'),
													  (1,'Entre 1 - 3 años'),
                                                      (1,'Entre 4 - 8 años'),
                                                      (1,'Más de 9 años'),
                                                      (2,'Internet'),
                                                      (2,'Prensa o revistas'),
                                                      (2,'Contactos empresariales'),
                                                      (2,'Amistades'),
                                                      (2,'Envio de información (Publicidad directa)'),
                                                      (3,'Totalmente'),
                                                      (3,'Mucho'),
                                                      (3,'Regular'),
                                                      (3,'Poco'),
                                                      (4,'Excelente'),
                                                      (4,'Muy bueno'),
                                                      (4,'Bueno'),
                                                      (4,'Regular'),
                                                      (4,'Malo');
select *from surveys_options;
CREATE TABLE surveys_answers (
a_id int NOT NULL auto_increment,
o_id int NOT NULL,
dni varchar(20) not null,
a_created_at timestamp null default now(),
PRIMARY KEY  (a_id),
foreign key(o_id) references surveys_options(o_id),
foreign key(dni) references user(dni)
)

SELECT *FROM surveys_answers