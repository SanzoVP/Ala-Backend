DROP DATABASE IF EXISTS ALA_Questions_test2;
CREATE DATABASE ALA_Questions_test2;

-- Select the database
USE ALA_Questions_test2;


CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    question_id INT NOT NULL,
    score INT NOT NULL
);

INSERT INTO scores (user_id, question_id, score) VALUES (1, 1, 2);


SELECT SUM(score) FROM scores WHERE user_id = 1;


SELECT user_id, score FROM scores WHERE question_id = 1;
