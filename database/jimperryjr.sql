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

	unique index id (team_id),
	foreign key (team_id) references artist(team_id),
	primary key (member_id)	
);


/*create users*/
create user if not exists artist@192.185.39.71 identified by 'music2015'; 

grant select, insert, update 
on *.*
to 'artist'@'localhost' require none;

 