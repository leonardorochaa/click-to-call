;--------------------------------------------------------------------------------------------------------; </br>
;<b> Scrip em PHP que gera uma chamada automática, quando preenchemos as informações do formulário na web </b>
;--------------------------------------------------------------------------------------------------------;</br>

- Chamada é gerada através de um servidor asterisk, utilizei o PABX ISSABEL;</br>
- Asterisk possui banco de dados(MYSQL) com as seguintes tabelas (clicktocall, manager)</br>

Descrição de cada tabela!</br>

* Table clicktocall : </br>

+---------+-------------+------+-----+---------------+----------------+</br>
| Field   | Type        | Null | Key | Default       | Extra          |</br>
+---------+-------------+------+-----+---------------+----------------+</br>
| id      | int(11)     | NO   | PRI | NULL          | auto_increment |</br>
| norigem | int(4)      | NO   |     | NULL          |                |</br>
| context | varchar(45) | NO   |     | from-internal |                |</br>
+---------+-------------+------+-----+---------------+----------------+</br>

* Table manager :</br>

+----------+-------------+------+-----+---------+----------------+</br>
| Field    | Type        | Null | Key | Default | Extra          |</br>
+----------+-------------+------+-----+---------+----------------+</br>
| id       | int(11)     | NO   | PRI | NULL    | auto_increment |</br>
| server   | varchar(16) | NO   |     | NULL    |                |</br>
| port     | int(11)     | NO   |     | 5038    |                |</br>
| protocol | varchar(6)  | NO   |     | tcp     |                |</br>
| username | varchar(45) | NO   |     | NULL    |                |</br>
| password | varchar(45) | NO   |     | NULL    |                |</br>
+----------+-------------+------+-----+---------+----------------+</br>

Criação das tabelas acima!</br>

* Create Table clicktocall :</br>

CREATE TABLE `clicktocall` (</br>
  `id` int(11) NOT NULL AUTO_INCREMENT,</br>
  `norigem` int(4) NOT NULL,</br>
  `context` varchar(45) NOT NULL DEFAULT 'from-internal',</br>
  PRIMARY KEY (`id`)</br>
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1</br>
</br>

* Create Table manager :</br>

CREATE TABLE `manager` (</br>
  `id` int(11) NOT NULL AUTO_INCREMENT,</br>
  `server` varchar(16) NOT NULL,</br>
  `port` int(11) NOT NULL DEFAULT '5038',</br>
  `protocol` varchar(6) NOT NULL DEFAULT 'tcp',</br>
  `username` varchar(45) NOT NULL,</br>
  `password` varchar(45) NOT NULL,</br>
  PRIMARY KEY (`id`)</br>
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1</br>


- Configuração do manager, realizada no diretório /etc/asterisk/manager.conf :</br>

[admin]</br>
secret = 123qwe</br>
deny=0.0.0.0/0.0.0.0</br>
permit=127.0.0.1/255.255.255.0</br>
read = system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate</br>
write = system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate</br>
writetimeout = 5000</br>

- Asterisk possui dois ramais de teste para que funcione o click-to-call : </br>

Name/username             Host                                    Dyn Forcerport Comedia    ACL Port     Status      Description</br>
998/998                   192.168.0.19                             D  No         No          A  47464    OK (10 ms)</br>                 
999/999                   192.168.0.11                             D  No         No          A  53803    OK (1 ms)</br> 

O restante é feito com o script PHP e com um HTML CSS básico de um formulário.</br>

Script PHP : clicktocall.php</br>
Script Conexão Banco de Dados : conexaobd.php</br>
Página principal HTML e CSS : index.php</br>
Script manager : manager.php</br>

Sei que clicktocall é você clicando em algo e mandando a discagem e etc, mas nesse caso fiz através de um formulário, caso necessário poderá utilizar também clicando em algo, basta alterar de acordo com a sua utilização.</br>

Vlww tmj :)


