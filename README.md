# tela_de_login
 Tela de login... trabalho acadêmico.
 Para fazer rodar vai ser preciso fazer um banco de dados. Eu usei o XAMPP.
 * Quando estiver o XAMPP instalado no computador é so abri ele e ativar o apache e o Mysql vai ficar com uma cor verde.
 * Vai no navegador digita url: http://localhost/phpmyadmin
 * Encontra SQL e abre. E faz essas linha de código.
 ```
 CREATE DATABASE projeto_login;
 
 use projeto_login

 CREATE TABLE USUARIO(
  id_usuario  int AUTO_INCREMENTO PRIMARY KEY,
  nome varchar(30),
  telefone varchar(30),
  email varchar(40),
  senha varchar(32));
```
 
 
 * É só pegar os arquivo de código fonte do login e locar dentro da pasta do xampp.
    * Vai disco C: do computador localiza a pasta xampp.
    * Dentro do Xampp tem outra pasta htdocs. Coloque a pasta do tela_de_login dentro dela.
 * Vai no navegador digite:http://localhost/tela_de_login/index.php
  
 
