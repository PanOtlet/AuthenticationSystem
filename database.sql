CREATE TABLE users
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(20),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    password VARCHAR(255) NOT NULL,
    active TINYINT NOT NULL,
    active_hash VARCHAR(255),
    recover_hash VARCHAR(255),
    remember_identifier VARCHAR(255),
    remember_token VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT '0000-00-00 00:00:00' NOT NULL,
    email VARCHAR(255) NOT NULL
);
