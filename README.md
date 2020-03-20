Register-Auth
Register/Auth form on PHP + MySQl

MYSQL CODE: 
CREATE TABLE users 
( id int(11) NOT NULL PRIMARY KEY,
name varchar(64) NOT NULL, 
email varchar(64) NOT NULL UNIQUE, 
email_status tinyint(1) NOT NULL DEFAULT '0', 
password varchar(100) NOT NULL, 
blocked tinyint(1) NOT NULL DEFAULT '0', 
register_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE=InnoDB
