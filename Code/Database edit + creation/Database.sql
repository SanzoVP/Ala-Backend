DROP DATABASE IF EXISTS ALA_Questions_test;
CREATE DATABASE ALA_Questions_test;

USE ALA_Questions_test;
CREATE TABLE questions (
  ID INT NOT NULL AUTO_INCREMENT,
  question VARCHAR(255),
  answer BOOLEAN,
  PRIMARY KEY (ID)
);

-- Insert data into the table
INSERT INTO ALA_Questions_test.questions (question, answer) VALUES 
    ('this is true', TRUE),
    ('this is fasle', FALSE),
    ('Ehhh -Renzo (true)', TRUE),
    ('Anil is HOMOPHOBIC', TRUE),
    ('Anil is smort', TRUE);

-- Query the table to get information about the responses
SELECT *
FROM questions;
