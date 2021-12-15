<?php

//Inicio script

// Chega informações enviadas através da web
  if(isset($_POST['submit']) and !empty($_POST['norigem']) and !empty($_POST['ndestino']) and !empty($_POST['callerid']))
  {
    include_once('manager.php');
    include_once('conexaobd.php');
    $nOrigem = $_POST['norigem'];
    $nDestino = $_POST['ndestino'];
    $callerid = $_POST['callerid'];
  }
  else
  { 
    header('Location: index.php');
  }

//  Checa ramal Origem
  $sqlNorigem = "SELECT * FROM clicktocall where norigem='$nOrigem'";
  $resultNorigem = $conexao->query($sqlNorigem);

  if ($resultNorigem->num_rows < 1)
  {
      exit(header('Location: index.php'));
  }


// Verifica o contexto do ramal
$sqlContexto = "SELECT * FROM clicktocall where norigem='$nOrigem'";
$resultContexto = $conexao->query($sqlContexto);

if($resultContexto->num_rows > 0)
{
    while($user_data = mysqli_fetch_assoc($resultContexto))
    {
        $contexto = $user_data['context'];
    }
}


  $socket = stream_socket_client("$protocol://$server:$port");
//  $numeroDestino = $_GET['numeroDestino'];
  
if($socket)
  {
      // Autenticando no Manager
      $authenticationRequest = "Action: Login\r\n";
      $authenticationRequest .= "Username: $username\r\n";
      $authenticationRequest .= "Secret: $password\r\n";
      $authenticationRequest .= "Events: off\r\n\r\n";

      // Enviando autenticação
      $authenticate = stream_socket_sendto($socket, $authenticationRequest);

      if($authenticate > 0)
      {
          // Aguarde a resposta do servidor
          usleep(200000);
          // Ler a resposta do servidor
          $authenticateResponse = fread($socket, 4096);

          // Verifique se a autenticação foi bem sucedida
          if(strpos($authenticateResponse, 'Success') !== false)
          {
              // Enviando requisição da chamada para o manager
              $originateRequest = "Action: Originate\r\n";
              $originateRequest .= "Channel: SIP/$nOrigem\r\n";
              $originateRequest .= "Callerid: $callerid\r\n";
              $originateRequest .= "Exten: $nDestino\r\n";
              $originateRequest .= "Context: $contexto\r\n";
              $originateRequest .= "Priority: 0\r\n";
              $originateRequest .= "Async: yes\r\n\r\n";
              
              $originate = stream_socket_sendto($socket, $originateRequest);
              if($originate > 0)
              {
                  // Aguarde a resposta do servidor
                  usleep(200000);
                  // Ler a resposta do servidor
                  $originateResponse = fread($socket, 4096);
                  // Verifique se a autenticação foi bem sucedida
                  if(strpos($originateResponse, 'Success') !== false)
                  {
	              echo "<script>alert('Chamada Iniciada, discando.');</script>";
                  } else {
                      echo "<script>alert('Não foi possível iniciar a chamada.');</script>\n";
                  }
              } else {
                  echo "<script>alert('Não foi possível escrever um pedido de iniciação de chamada para o soquete.');</script>\n";
              }
          } else {
              echo "<script>alert('Não foi possível autenticar na interface do Asterisk Manager.');</script>\n";
          }
      } else {
          echo "<script>alert('Não foi possível escrever o pedido de autenticação no soquete.');</script>\n";
      }
  } else {
      echo "<script>alert('Incapaz de conectar ao soquete.');</script>";
}
?>
