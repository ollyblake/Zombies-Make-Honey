# Temperary database for zombies make honey

CREATE DATABASE IF NOT EXISTS zombeesTemp;

USE zombeesTemp

# Post table a main table for storing the values for the blog

CREATE TABLE IF NOT EXISTS postTemp (
	id INT NOT NULL AUTO_INCREMENT,
	title CHAR(80),
	description TEXT,
	image1 CHAR(40),
	image2 CHAR(40),
	image3 CHAR(40),
	image4 CHAR(40),
	user_id INT,
	post_it enum('yes','no') default 'no',
	dateadded datetime DEFAULT CURRENT_TIMESTAMP,
	updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
);

# User table stores password as SHA-256 generates a 256-bit hash value. 
# You can use CHAR(64) or BINARY(32)

CREATE TABLE IF NOT EXISTS userTemp (
	user_id INT NOT NULL AUTO_INCREMENT,
	name CHAR(80) NOT NULL,
	email CHAR(200) NOT NULL,
	password BINARY(32) NOT NULL,
	dateadded datetime DEFAULT NULL,
	UNIQUE (name, email),
	PRIMARY KEY(user_id)
);

INSERT INTO postTemp(
	id,
	title,
	description,
	image1,
	image2,
	image3,
	image4
)
 values(
	'',
	'Some Artwork I did',
	'this is some sample text for the first entry into my database',
	'/images/image1.jpeg',
	'/images/image2.jpeg',
	'/images/image3.jpeg',
	'/images/image4.jpeg'
	);

insert into userTemp (
	user_id,
	name,
	email,
	password
)
values(
0,
'Olly Blake',
'blake.olly@gmail.com',
'password'
);

