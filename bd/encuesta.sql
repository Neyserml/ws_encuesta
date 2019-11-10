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