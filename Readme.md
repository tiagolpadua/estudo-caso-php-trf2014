# Comandos

## apache

sudo apt install apache2
sudo systemctl status apache2
sudo systemctl start apache2
sudo systemctl stop apache2
sudo systemctl restart apache2

## mysql

sudo systemctl start mysql.service
sudo systemctl stop mysql.service
sudo systemctl status mysql.service
sudo mysql -uroot -p123456

## sql

CREATE DATABASE banco;

CREATE TABLE funcionario (
id INT(6) UNSIGNED PRIMARY KEY NOT NULL,
nome VARCHAR(30)
);

INSERT INTO funcionario (id, nome) VALUES (1, 'Pedro');