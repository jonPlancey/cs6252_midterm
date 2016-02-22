/*create database*/
DROP DATABASE IF EXISTS
  jim_team_member;
CREATE DATABASE IF NOT EXISTS jim_team_member;
USE
  jim_team_member;

 
/*create tables*/
CREATE TABLE team (
	team_id				int				auto_increment,
	team_name			varchar(255)	not null 		unique,
	team_description	varchar(500)	not null,	
	
	primary key (team_id)
);

/*create tables*/
CREATE TABLE member (
	team_id				int				not null,
	member_id			int				auto_increment,	
	member_name			varchar(255)	not null,
	member_birthday		date			not null,

	unique index team_id (team_id),	
	foreign key (team_id) references team(team_id),		
	primary key (member_id)	
);

/*create users*/
create user if not exists jim_member@localhost identified by 'midterm2015'; 
grant select, insert, update 
on *.*
to 'jim_member'@'localhost' require none;



/*update table: team*/
insert into team (team_name, team_description) values
	('Sneaky Miners', 		'PHP coders'),
	('Fighting Heroes',		'C++ developers'),
	('Reptile Crunchers', 	'the best in R programming'),
	('Knockout Bandits', 	'C# deve heads')
	
	('Alpha Soldiers', 		'javaScript junkies for the web'),
	('Delta Predators',		'People who love Objective-C'),
	('American Geckos', 	'Visual Basic velocity in motion'),
	('Spinning Gangstaz', 	'Promising pythong people')	
	


/*update table: member*/
CREATE TABLE member (member_name, member_birthday) values
	('jim', 	2003-12-31)
	('bob', 	2003-12-31)
	('sally',	2003-12-31)
	('sue', 	2003-12-31)
	('frank', 	2003-12-31)
	('justin', 	2003-12-31)
	('petter', 	2003-12-31)
	('paul', 	2003-12-31)
}