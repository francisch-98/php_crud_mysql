CREATE DATABASE php_mysql_crud;

use php_mysql_crud;

CREATE TABLE product(
  id_product INT(11) PRIMARY KEY AUTO_INCREMENT,
  name_product VARCHAR(255) NOT NULL,
  description_product TEXT,
  price_product DECIMAL,
  acount_product INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE product;