<?php

// Variáveis de conexão do banco de dados
define($dbHost='localhost');
define($dbUsername='root');
define($dbPass='123qwe');
define($dbName='test');

// Inicia conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPass, $dbName);

