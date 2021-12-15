<?php

include_once('conexaobd.php');

$sql = "SELECT * from manager";
$result = $conexao->query($sql);


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

