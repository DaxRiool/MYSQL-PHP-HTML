CREATE DATABASE werknemers;
USE werknemers;
CREATE TABLE `gebruikers` (
	id MEDIUMINT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    wachtwoord VARCHAR(100));


INSERT INTO gebruikers (username, wachtwoord) 
VALUES ("Test-User", "Testwachtwoord");