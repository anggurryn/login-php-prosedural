<h2>Create Database Sekolah</h2>
create database Sekolah;
<h2>Create Table Students</h2>
create table students(<br>
    id_students int auto_increment, <br>
    nis int(4), <br>
    name varchar(50),<br>
    address varchar(100),<br>
    dateOfBirth date,<br>
    gender varchar(20),<br>
    password varchar(255),<br>
    primary key(id_students)<br>
);
