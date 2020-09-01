CREATE DATABASE wilde_bwd;

use wilde_bwd;

CREATE TABLE recipies (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	recipe VARCHAR(30) NOT NULL,
	recipe_description VARCHAR(50) NOT NULL,
	recipe_method VARCHAR(500) NOT NULL,
    protien VARCHAR(30),
    ingredients VARCHAR(500) NOT NULL
);
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);