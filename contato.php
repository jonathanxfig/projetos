
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
                <li><a href="carrinho.php">CARRINHO</a> </li>
                <li><a href="contato.php">CONTATO</a> </li>
                <li><a href="sobre.html">SOBRE</a> </li>
            </ul>
        </nav>
    </header>

    <!-- Formulário de Contato-->
        <section class="contato">
            
            <div class="cont" i="cont">
                <h1>FALE CONOSCO</h1>

                <form action="contato.php" method="post">

                    <input type="text" id="nome_cont" name="nome_cont" placeholder="Digite o seu nome completo">
                    <br>

                    <input type="e-mail" id="email_cont" name="email_cont" placeholder="Digite o seu email">
                    <br>
                    
                    <input type="number" id="telefone_cont" name="telefone_cont"  pattern="{11}" placeholder="Digite seu Whatsapp">
                    <br>

                    <textarea id="comentario_cont" name="comentario_cont" placeholder="Digite seu comentário"></textarea>
                    <br>

                    <input type="submit" id="enviar_contato" name="enviar_contato"  value="ENVIAR">


                </form>
            </div>

            <div class="cont">
                <img src="img/fale_conosco" alt="Fale Conosco">
            </div>

        </section>


    

<!--Rodapé-->
<footer>
    <div class="rodape">
        <ul>
                <li><a href="index.html">HOME</a> </li>
                <li><a href="catalogo1.php">CATÁLOGO</a>
                <li><a href="carrinho.php">CARRINHO</a> </li>
                <li><a href="contato.php">CONTATO</a> </li>
                <li><a href="sobre.html">SOBRE</a> </li>
            
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

</body>

<!--Configuração do PHP-->

<?php

if(isset($_POST['enviar_contato'])){

    include_once('conectar.php');

    $nome_cont = $_POST['nome_cont'];
    $email_cont = $_POST['email_cont'];
    $tel_cont = $_POST['telefone_cont'];
    $comentario_cont = $_POST['comentario_cont'];

    $contatos = mysqli_query($conexao, "INSERT INTO comentario_clientes (nome_cont, email_cont, telefone_cont, comentario_cont)
    VALUE ('$nome_cont','$email_cont','$tel_cont','$comentario_cont')");

    header('Location:contato.php');

}

?>

</html>