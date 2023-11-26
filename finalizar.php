<?php
session_start();

include_once('conectar.php');

// Obtém o id_usuario da sessão
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

// Verificar se o id_usuario não é nulo
if ($id_usuario === null) {
    die("Erro: id_usuario não encontrado na sessão.");
}

// Verificar se o carrinho está vazio
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php");
    exit();
}

// Calcular o total da compra
$total = array_reduce(
    $_SESSION['carrinho'],
    function ($carry, $item) {
        return $carry + ($item['preco'] * $item['quantidade']);
    },
    0
);

// Geração de um número de pedido único
$numero_pedido = uniqid();

// Armazenamento temporário dos detalhes do pedido na sessão
$_SESSION['numero_pedido'] = $numero_pedido;

// Inicializa $forma_de_pagamento para evitar o aviso de variável indefinida
$forma_de_pagamento = '';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar_compra'])) {
    // Processar informações do cliente
    $nome_usuario = isset($_POST['nome_usuario']) ? $_POST['nome_usuario'] : '';
    $email_usuario = isset($_POST['email_usuario']) ? $_POST['email_usuario'] : '';
    $telefone_usuario = isset($_POST['telefone_usuario']) ? $_POST['telefone_usuario'] : '';
    $endereco_usuario = isset($_POST['endereco_usuario']) ? $_POST['endereco_usuario'] : '';
    $cpf_usuario = isset($_POST['cpf_usuario']) ? $_POST['cpf_usuario'] : '';
    $forma_de_pagamento = isset($_POST['forma_de_pagamento']) ? $_POST['forma_de_pagamento'] : '';

    // Inserir dados do cliente na tabela cadastro_usuarios
    $query_cliente = "INSERT INTO cadastro_usuarios (nome_usuario, email_usuario, telefone_usuario, endereco_usuario, cpf_usuario, forma_de_pagamento) VALUES ('$nome_usuario','$email_usuario','$telefone_usuario','$endereco_usuario','$cpf_usuario','$forma_de_pagamento')";

    // Executar a consulta
    if ($conexao->query($query_cliente) === false) {
        die("Erro na execução da consulta: " . $conexao->error);
    }

    // Obter o ID do último registro inserido
        $id_cliente_inserido = $conexao->insert_id;

    // Armazenar os detalhes do pedido na sessão
        $_SESSION['detalhes_pedido'] = [
        'id_cliente' => $id_cliente_inserido,
        'nome_usuario' => $nome_usuario,
        'email_usuario' => $email_usuario,
        'telefone_usuario' => $telefone_usuario,
        'endereco_usuario' => $endereco_usuario,
        'cpf_usuario' => $cpf_usuario,
        'forma_pagamento' => $forma_de_pagamento,
        'cupcakes' => $_SESSION['carrinho'],
        'valor_total' => $total,
        // Adicione outros detalhes do pedido conforme necessário
        ];

    // Limpar o carrinho após a compra (isso pode variar dependendo da sua lógica)
    $_SESSION['carrinho'] = array();

    // Redirecionar para uma página de confirmação ou agradecimento
    header("Location: confirmacao.php");
    exit();

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
                <li><a href="carrinho.php">CARRINHO</a> </li>
                <li><a href="contato.php">CONTATO</a> </li>
                <li><a href="sobre.html">SOBRE</a> </li>
            </ul>
        </nav>
    </header>

<div class ="finalizar">
        <h1>Finalizar Compra</h1>

        <?php if (!empty($_SESSION['carrinho'])): ?>
            <!-- Exibir os itens do carrinho aqui -->
            <table border="1">
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
                <?php foreach ($_SESSION['carrinho'] as $item): ?>
                    <tr>
                        <td><?php echo $item['nome']; ?></td>
                        <td>R$<?php echo number_format($item['preco'], 2); ?></td>
                        <td><?php echo $item['quantidade']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

     <!-- Formulário de finalização de compra -->
     <form action="finalizar.php" method="post">
                <label for="nome_usuario">Nome:</label>
                <input type="text" name="nome_usuario" required><br>

                <label for="email_usuario">E-mail:</label>
                <input type="email" name="email_usuario" required><br>

                <label for="telefone_cliente">Telefone:</label>
                <input type="tel" name="telefone_usuario" required><br>

                <label for="endereco_usuario">Endereço:</label>
                <input type="text" name="endereco_usuario" required><br>

                <label for="cpf_usuario">CPF:</label>
                <input type="text" name="cpf_usuario" required><br>

                <label for="forma_de_pagamento">Forma de Pagamento:</label>
                <select name="forma_de_pagamento" id="forma_de_pagamento">
                    <option value="cartao_credito">Cartão de Crédito</option>
                    <option value="debito">Débito</option>
                    <option value="pix">Pix</option>
                    <!-- Adicione mais opções conforme necessário -->
                </select>

                <?php if ($forma_de_pagamento === 'pix'): ?>
                    <label for="codigo_pix">Código Pix:</label>
                    <input type="text" name="codigo_pix" required><br>
                <?php endif; ?>

                <input type="submit" name="finalizar_compra" value="Finalizar Compra">
                <input type="submit" onclick="cancelarCompra()" value="Cancelar Compra">

                <script>
                function cancelarCompra() {
                    // Voltar para a página do carrinho
                    window.location.href = "carrinho.php";

                     // Desativar o atributo 'required' para todos os campos
                        var campos = document.querySelectorAll('#formFinalizar [required]');
                        campos.forEach(function (campo) {
                        campo.removeAttribute('required');
                        });
                    }
                </script>

                </form>
    

        <?php else: ?>
            <p>Seu carrinho está vazio.</p>
        <?php endif; ?>
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
