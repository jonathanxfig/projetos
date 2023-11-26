

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

    <!-- Formulário de Cadastro-->

    <div class="cadastro">
       
    <div class="cad" id=cadastro>
            <h1>Cadastro de Clientes</h1>
            <form action="cadastro.php" method="post">
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo"> <br>
                
                <input type="number" id="cpf" name="cpf" placeholder="Digite seu cpf"><br>
                
                <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço"> <br>
                
                <input type="email" id="email" name ="email" placeholder="Digite seu e-mail"><br>
                
                <input type="password" id="senha" name="senha" placeholder="Digite uma senha"><br>

                <input type="submit" id="botao_cadastrar" name="submit" value="CADASTRAR">


        </div>

        <div class="cad">
        <img src="img/cadastrar.png" alt="Cad de Cliente">
    </div>
    
    </div>

    

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
    $senha = $_POST['senha'];

    $clientes = mysqli_query($conexao, "INSERT INTO cadastro_clientes(nome_cliente, cpf_cliente, endereco_cliente, email_cliente, senha_cliente)
     VALUE ('$nome','$cpf','$endereco','$email','$senha')");

    header('Location:login.php');
}

?>

</body>



</html>
