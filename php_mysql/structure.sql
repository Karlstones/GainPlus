CREATE DATABASE gainsplus;
USE gainsplus;
CREATE TABLE utilisateurs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255),
  email VARCHAR(255),
  inscrit_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);