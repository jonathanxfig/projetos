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

<!--TEXTO-->

<div class="catalogo_text">CATÁLOGO DE CUPCAKES!</div>

<div class="catalogo_new">
<?php
        session_start();

        // Array de cupcakes
        $cupcakes = [
            array('id' => 1, 'nome' => 'Cupcake de Morango', 'preco' => 3.50, 'imagem' => 'img/cupcake_morango.png'),
            array('id' => 2, 'nome' => 'Cupcake de Chocolate', 'preco' => 4.00, 'imagem' => 'img/cupcake_chocolate.png'),
            array('id' => 3, 'nome' => 'Cupcake de Baunilha', 'preco' => 3.00, 'imagem' => 'img/cupcake_baunilha.png'),
            array('id' => 4, 'nome' => 'Cupcake de Limão', 'preco' => 5.00, 'imagem' => 'img/cupcake_limao.png'),
            array('id' => 5, 'nome' => 'Cupcake de Laranja', 'preco' => 4.50, 'imagem' => 'img/cupcake_laranja.png'),
            array('id' => 6, 'nome' => 'Cupcake de Maracujá', 'preco' => 6.00, 'imagem' => 'img/cupcake_maracuja.png'),
            array('id' => 6, 'nome' => 'Cupcake de Cereja', 'preco' => 6.00, 'imagem' => 'img/cupcake_cereja.png'),
        ];

        // Exibe os cupcakes
        foreach ($cupcakes as $cupcake) {
            echo '<div>';
            echo '<h3>' . $cupcake['nome'] . '</h3>';
            echo '<img src="' . $cupcake['imagem'] . '" alt="' . $cupcake['nome'] . '" width="100" height="100">'; 
            echo '<p>Preço: R$' . number_format($cupcake['preco'], 2) . '</p>';
            echo '<form action="carrinho.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $cupcake['id'] . '">';
            echo '<input type="hidden" name="nome" value="' . $cupcake['nome'] . '">';
            echo '<input type="hidden" name="preco" value="' . $cupcake['preco'] . '">';
            echo '<label for="quantidade">Quantidade:</label>';
            echo '<input type="number" name="quantidade" value="1" min="1">';
            echo '<input type="submit" value="Adicionar ao Carrinho">';
            echo '</form>';
            echo '</div>';
        }

        // Link para visualizar o carrinho
        echo '<p><a class="cart-link" href="carrinho.php"><img class="cart-image" src="img/carrinho.png" alt="Carrinho">Ver Carrinho</a></p>';
    ?>
    </div>





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



</html>