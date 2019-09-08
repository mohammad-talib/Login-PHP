create table users(
    id int auto_increment primary key,
    name varchar(25) not null,
    email varchar(25) not null,
    password varchar(25) not null,
    gender varchar(1) not null,
    rule varchar(5) DEFAULT 'user'
);


insert into users(name,email,password,gender,rule) value('mohammed','mohammed@gmail.com','123321','m','admin');
