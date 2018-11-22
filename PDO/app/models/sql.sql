create database curso_pdo;

create table name(id int(11) auto_increment primary key, name varchar(50) not null, 
email varchar(50) unique key not null, password varchar(150) null, 
created_at timestamp null default current_timestamp);


create table posts(id int(11) auto_increment primary key, title varchar(50) not null, 
user int(11) not null, description text not null, password varchar(150) null, 
created_at timestamp null default current_timestamp);

insert into name(name, email, password) values ('teste','teste@teste.com','123');