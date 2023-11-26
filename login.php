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

    <!-- Formulário de Login-->

    <div class="login">
        <div class="logar">
            <h1>LOGIN</h1>
                <form action="entrar.php" method="post">
                    <input type="email" name="email" id="email_usuario" placeholder="Digite seu e-mail"> <br>
                    <input type="password" name="senha" id="senha_usuario" placeholder="Digite sua senha"> <br>
                    <input type="submit" name="submit" id="btn_logar" value="ENTRAR"> 
                </form>
        </div>


        <div class="logar" id=logar_img>
            <img src="img/login.png" alt="">
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

</body>



</html>