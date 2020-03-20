Register-Auth
Register/Auth form on PHP + MySQl

MYSQL CODE: <br>
> CREATE TABLE users <br>
> ( id int(11) NOT NULL PRIMARY KEY,<br>
> name varchar(64) NOT NULL, <br>
> email varchar(64) NOT NULL UNIQUE, <br>
> email_status tinyint(1) NOT NULL DEFAULT '0', <br>
> password varchar(100) NOT NULL, <br>
> blocked tinyint(1) NOT NULL DEFAULT '0', <br>
> register_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE=InnoDB>
