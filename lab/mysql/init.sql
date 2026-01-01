CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(100)
);

INSERT INTO users (username, password, email) VALUES ('admin', 'p@ssword123', 'admin@example.com');
INSERT INTO users (username, password, email) VALUES ('user1', 'user1pass', 'user1@example.com');
INSERT INTO users (username, password, email) VALUES ('ismail', 'secret', 'ismail@exploit.com');
