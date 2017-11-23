create database kmong;

use kmong;

create table mycontact(
	id int(5) not null,
	name varchar(20) not null, 
	phone varchar(20), 
	email varchar(100), 
	img varchar(100), 
	note text, 
	reg_date datetime,
	primary key(id) 
)Engine='InnoDB' default charset='utf8';
