
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

    <div class="confirmacao">
        <h1>Pedido Concluído</h1>

        <?php
        session_start();

        // Verificar se há detalhes do pedido na sessão
        if (isset($_SESSION['detalhes_pedido'])) {
             $detalhes_pedido = $_SESSION['detalhes_pedido'];

            // Exibir os detalhes do pedido
            echo "ID do Cliente: " . $detalhes_pedido['id_cliente'] . "<br>";
            echo "Nome do Cliente: " . $detalhes_pedido['nome_usuario']. "<br>";
            echo "E-mail: " . $detalhes_pedido['email_usuario']. "<br>";
            echo "Telefone: " . $detalhes_pedido["telefone_usuario"]. "<br>";
            echo "Endereço: " . $detalhes_pedido["endereco_usuario"]. "<br>";
            echo "CPF: " . $detalhes_pedido["cpf_usuario"]. "<br>";
            echo "Forma de Pagamento: " . $detalhes_pedido['forma_pagamento'] . "<br>";

            
            } else {
            echo "Erro: Detalhes do pedido não encontrados.";
            }

            echo "<p>Cupcakes Comprados:</p>";
                echo "<ul>";
                    foreach ($detalhes_pedido['cupcakes'] as $cupcake) {
                     echo "<li>{$cupcake['nome']} - Quantidade: {$cupcake['quantidade']}</li>";
                    }
                echo "</ul>";
                echo "<p>Valor Total: R$ " . number_format($detalhes_pedido['valor_total'], 2) . "</p>"

    
        ?>

        <img src="img/pedido_confirmado.png" alt="Imagem de Confirmação">

    </div>
    <?php
    // Limpar a sessão ou realizar outras ações necessárias
    session_unset();
    session_destroy();
    ?>

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