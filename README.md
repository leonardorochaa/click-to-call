;------------------------------------------------------------------------------------------------------;
;<b> Scrip em PHP que gera uma chamada automática, quando preenchemos as informações do formulário na web.</b.;
;------------------------------------------------------------------------------------------------------;

- Chamada é gerada através de um servidor asterisk, utilizei o PABX ISSABEL;
- Asterisk possui banco de dados(MYSQL) com as seguintes tabelas (clicktocall, manager)

Descrição de cada tabela!

* Table clicktocall : 

+---------+-------------+------+-----+---------------+----------------+
| Field   | Type        | Null | Key | Default       | Extra          |
+---------+-------------+------+-----+---------------+----------------+
| id      | int(11)     | NO   | PRI | NULL          | auto_increment |
| norigem | int(4)      | NO   |     | NULL          |                |
| context | varchar(45) | NO   |     | from-internal |                |
+---------+-------------+------+-----+---------------+----------------+

* Table manager :

+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id       | int(11)     | NO   | PRI | NULL    | auto_increment |
| server   | varchar(16) | NO   |     | NULL    |                |
| port     | int(11)     | NO   |     | 5038    |                |
| protocol | varchar(6)  | NO   |     | tcp     |                |
| username | varchar(45) | NO   |     | NULL    |                |
| password | varchar(45) | NO   |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+

Criação das tabelas acima!

* Create Table clicktocall :

CREATE TABLE `clicktocall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `norigem` int(4) NOT NULL,
  `context` varchar(45) NOT NULL DEFAULT 'from-internal',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1


* Create Table manager :

CREATE TABLE `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server` varchar(16) NOT NULL,
  `port` int(11) NOT NULL DEFAULT '5038',
  `protocol` varchar(6) NOT NULL DEFAULT 'tcp',
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1


- Configuração do manager, realizada no diretório /etc/asterisk/manager.conf :

[admin]
secret = 123qwe
deny=0.0.0.0/0.0.0.0
permit=127.0.0.1/255.255.255.0
read = system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate
write = system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate
writetimeout = 5000

- Asterisk possui dois ramais de teste para que funcione o click-to-call : 

Name/username             Host                                    Dyn Forcerport Comedia    ACL Port     Status      Description                      
998/998                   192.168.0.19                             D  No         No          A  47464    OK (10 ms)                                   
999/999                   192.168.0.11                             D  No         No          A  53803    OK (1 ms)  

O restante é feito com o script PHP e com um HTML CSS básico de um formulário.

Script PHP : clicktocall.php
Script Conexão Banco de Dados : conexaobd.php
Página principal HTML e CSS : index.php
Script manager : manager.php

Sei que clicktocall é você clicando em algo e mandando a discagem e etc, mas nesse caso fiz através de um formulário, caso necessário poderá utilizar também clicando em algo, basta alterar de acordo com a sua utilização.

Vlww tmj :)


