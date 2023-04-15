CREATE DATABASE PROJECT;
USE PROJECT;


CREATE TABLE products (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_name VARCHAR(255) NOT NULL,
  product_price DECIMAL(10,2) NOT NULL,
  product_description TEXT NOT NULL,
  product_image TEXT,
  PRIMARY KEY (id)
);
SELECT * from products;


GRANT ALL PRIVILEGES ON project.* TO 'root'@'localhost';





