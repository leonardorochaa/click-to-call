<?php

// Abre conexão com o banco de dados
include_once('conexaobd.php');

// Consulta tabela manager
$sql = "SELECT * from manager";
$result = $conexao->query($sql);

// Trás os resultados de cada coluna salvando em uma variável
if($result->num_rows > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $server = $row['server'];
        $port = $row['port'];
        $protocol = $row['protocol'];
        $username = $row['username'];
        $password = $row['password'];
    }
}
else
{
    echo "Falha ao conectar no manager!";
}

?>
