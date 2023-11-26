<?php

session_start(); //Iniciar uma sessão

//Ação da página login.php//

if(isset ($_POST['submit']) && !empty($_POST['email']) 
&& !empty($_POST['senha']))
{
// não está vazio os campos
// conectar o banco de dados

include_once('conectar.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

//Verificar a tabela do banco de dados

$sql = "SELECT * FROM cadastro_clientes 
WHERE email_cliente ='$email' and senha_cliente = '$senha'";

$verificar = $conexao ->  query($sql);

//Verificar se o registo é valido

if(mysqli_num_rows ($verificar)< 1)
{
    //Destruir as variaveis
    unset($_SESSION['email_cliente']);
    unset($_SESSION['senha_cliente']);
    header('Location:login.php');
}

else {
    //Criar as variaveis da sessão
    $_SESSION['email_cliente'] = $email;
    $_SESSION['senha_cliente'] = $senha;
    header('Location:usuario.php');
}


}

else{
  // o campo está vazio
  header('Location: login.php');
}

?>