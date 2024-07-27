create table hospital(
code varchar(10),
name varchar(50) not null,
county varchar(20) not null,
sub_county varchar(20) not null,
location varchar(20) not null,
sub_location varchar(20) not null,
village varchar(20) not null,
land_mark varchar(50) not null,
phone varchar(20) ,
email varchar(50),
ownership varchar(15),
working varchar(2),
type varchar(20),
level varchar(20),
primary key(code)
);
create table doctor(
code varchar(10),
name varchar(30) not null,
id varchar(20),
phone varchar(20) not null,
email varchar(50) not null,
experties varchar(50),
availability varchar(15),
hcode varchar(10),
status varchar(20),
serving varchar(10),
r_status varchar(20),
primary key(code)
);
create table users(
code varchar(10),
name varchar(30) not null,
id varchar(20),
phone varchar(20) not null,
email varchar(50) not null,
username varchar(5) unique not null,
password varchar(5) not null,
level varchar(10) not null,
user_type varchar(5) not null,
primary key(code)
);
create table patient(
code varchar(10),
rcode varchar(10),
name varchar(30),
id varchar(20),
phone varchar(20),
email varchar(50),
county varchar(20),
sub_county varchar(20),
location varchar(20),
sub_location varchar(20),
village varchar(20),
pcondition varchar(100),
cause varchar(30),
agency varchar(20),
dcode varchar(10),
hcode varchar(10),
state varchar(20),
primary key(code)
);
create table doctor_hospital(
hcode varchar(10),
dcode varchar(10),
availability varchar(3)
);