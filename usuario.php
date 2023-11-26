<!--Configuração do PHP-->
<?php

//Iniciar uma sessão

session_start();

if((!isset($_SESSION['email_client'])==true)
and (!isset($_SESSION['senha_cliente'])==true))

{
//destruir as variaveis
unset($_SESSION['email_cliente']);
unset($_SESSION['senha_cliente']);
header('Location:login.php');
}

else{
    //criar as variaveis de acesso
    $logado = $_SESSION['email_cliente'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcun icon" href="img/logo1.png" type ="image/x-icon">
    <title>ON Cupcake</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo 250px.png" alt="Logotipo">
        </div>

        <nav>
            <ul>
              <li><a href="index.html">HOME</a> </li>
                <li><a href="catalogo1.php">CATÁLOGO</a>
                <li><a href="contato.php">CONTATO</a> </li>
                <li><a href="cadastro.php">CADASTRO</a> </li>
                <li><a href="login.php">LOGIN</a> </li>
                <li><a href="carrinho.php">CARRINHO</a> </li>
                <li><a href="sobre.html">SOBRE</a> </li>
            </ul>
        </nav>
    </header>

    <!-- SESSÃO DO USUÁRIO-->

    <section class="barra_top">
        <div class="barra">
            <h1> Área do Usuário </h1>
        </div>

        <div class="barra">
            <a href ="sair.php"> SAIR </a>
        </div>
    </section>

    <section class="usuario">
        <?php
        echo "<h2> Olá, $logado </h2>";
        ?>
        <p> Seja bem-vindo ao ON Cupcake </p>
    </section>
    

<!--Rodapé-->
<footer>
    <div class="rodape">
        <ul>
            <li><a href="index.html">HOME</a> </li>
                <li><a href="catalogo.html">CATÁLOGO</a>
                <li><a href="contato.php">CONTATO</a> </li>
                <li><a href="cadastro.php">CADASTRO</a> </li>
                <li><a href="login.php">LOGIN</a> </li>
            
        </ul>
    </div>
    
    <div class="rodape">
        <p> Rua Virtual, 123</p>
        <p> Rio de Janeiro</p>
    </div>

    <div class="rodape">
        <p>Siga as nossas redes sociais</p>
        <a href="#"><img src="img/facebook.png" alt="facebook"></a>
        <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
        <a href="#"><img src="img/youtube.png" alt="Youtube"></a>
    </div>
</footer>

<!--Configuração do PHP-->

<?php

if(isset($_POST['submit'])){

    include_once('conectar.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['sexo'];

    $clientes = mysqli_query($conexao, "INSERT INTO cadastro_clientes(nome_cliente, cpf_cliente, endereco_cliente, email_cliente, senha_cliente)
     VALUE ('$nome','$cpf','$endereco','$email','$senha')");
}

?>

</body>



</html>
