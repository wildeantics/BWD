CREATE DATABASE wilde_bwd;

use wilde_bwd;

CREATE TABLE works (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	artist VARCHAR(30) NOT NULL,
	song VARCHAR(50) NOT NULL,
	release VARCHAR(30),
    genre VARCHAR(30),
	date TIMESTAMP
);
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);