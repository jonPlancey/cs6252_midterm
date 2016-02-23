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
	member_birthday		date,

	index team_id (team_id),	
	foreign key (team_id) references team(team_id),		
	primary key (member_id)	
);

/*create users*/
create user if not exists jim_member@localhost identified by 'midterm2015'; 
grant select, insert, update 
on *.*
to 'jim_member'@'localhost' require none;



/*update table: team with team name and description*/
insert into team 
	(team_name, team_description) 
values
	('Sneaky Miners', 		'PHP coders'),
	('Fighting Heroes',		'C++ developers'),
	('Reptile Crunchers', 	'the best in R programming'),
	('Knockout Bandits', 	'C# deve heads'),
	
	('Alpha Soldiers', 		'javaScript junkies for the web'),
	('Delta Predators',		'People who love Objective-C'),
	('American Geckos', 	'Visual Basic velocity in motion'),
	('Spinning Gangstaz', 	'Promising pythong people');	


/*update table: member with name and category*/
insert into member 
	(member_name, member_birthday, team_id) 
values
	('Jim', 	'1977-01-25', 1),
	('Bob', 	'1978-01-24', 1),
	('Sally',	'1979-02-23', 1),
	('Sue', 	'1980-02-22', 2),
	('Frank', 	'1981-03-21', 2),
	('Justin', 	'1982-03-20', 5),
	('Petter', 	'1983-04-19', 5),
	('Paul', 	'1984-04-18', 8),
	
	('Harold', 	'1977-01-25', 3),
	('Robin', 	'1978-01-24', 3),
	('Sally',	'1979-02-23', 4),
	('Sam', 	'1980-02-22', 7),
	('Bucky', 	'1981-03-21', 7),
	('Justin', 	'1982-07-20', 8),
	('Will', 	'1983-09-19', 8),
	('Stacy', 	'1984-10-18', 8);	
