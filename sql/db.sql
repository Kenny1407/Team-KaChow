CREATE DATABASE php_ecomproject_db;

USE php_ecomproject_db;



CREATE TABLE IF NOT EXISTS user_info(
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  USERNAME VARCHAR (255),
  PASSWORD VARCHAR (255),
  FIRST_NAME VARCHAR (255),
  LAST_NAME VARCHAR (255),
  MIDDLE_NAME VARCHAR (255),
  EMAIL_ADDRESS VARCHAR (255),
  SUFFIX_NAME VARCHAR(255),
  ADDRESS VARCHAR (255),
  CITY VARCHAR (255),
  PROVINCE VARCHAR (255),
  ZIP INT (255)
);

ALTER TABLE user_info ADD COLUMN active BOOLEAN;

CREATE TABLE IF NOT EXISTS product_table (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(255),
    PRICE INT (255)

);

INSERT INTO product_table (name, price, id) VALUES
('Razer Laptop','100',1),
('HP Notebook','299',2),
('Lenovo Laptop','399',3),
('Predator Laptop','499',4);


ALTER TABLE product_table ADD COLUMN pic_url VARCHAR(255);
UPDATE product_table SET pic_url = 'razerlaptop1.png' WHERE id = 1;
UPDATE product_table SET pic_url = 'omenlaptop.png' WHERE id = 2;
UPDATE product_table SET pic_url = 'lenovolaptop.png' WHERE id = 3;
UPDATE product_table SET pic_url = 'predatorlaptop.png' WHERE id = 4;
