# database for zombies make honey

CREATE DATABASE IF NOT EXISTS zombees;

USE zombees

# Post table a main table for storing the values for the blog

CREATE TABLE IF NOT EXISTS post (
	id INT NOT NULL AUTO_INCREMENT,
	name CHAR(80) NOT NULL,
	title CHAR(80),
	description TEXT,
	image1 CHAR(100),
	image2 CHAR(100),
	image3 CHAR(100),
	image4 CHAR(100),
	post_it enum('yes','no') default 'no',
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
);

# User table stores password as SHA-256 generates a 256-bit hash value. 
# You can use CHAR(64) or BINARY(32)


INSERT INTO post(
	id,
	name,
	title,
	description,
	image1,
	image2,
	image3,
	image4
)
 values(
	'',
	'Olly',
	'Some Artwork I did',
	'this is some sample text for the first entry into my database',
	'/images/image1.jpeg',
	'/images/image2.jpeg',
	'/images/image3.jpeg',
	'/images/image4.jpeg'
	);

