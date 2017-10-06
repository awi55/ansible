create database Assignmentdb1;

go

Create table Orders(
firstname varchar(50) not null primary key,
lastname varchar(50) not null,
noOftyres int not null);

go

insert into Orders(firstname, lastname,noOfTyres)
values('john','smith',2);

go

alter table orders add Amount numeric null;

go

Update Orders
set Amount=noOftyres*110;