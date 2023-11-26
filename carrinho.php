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

<div class="carrinho">
<?php
session_start();

include_once('conectar.php'); 

// Verifica se a chave 'carrinho' está definida na sessão
if (!isset($_SESSION['carrinho']) || !is_array($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Adiciona produto ao carrinho se o ID do produto foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // Cria um array para armazenar o produto no carrinho
    $produto = array(
        'id' => $id,
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade,
    );

    // Adiciona o produto ao carrinho
    $_SESSION['carrinho'][] = $produto;
}

// Remove produto do carrinho se o ID do produto foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];

    // Encontrar o índice do produto no carrinho
    $index = array_search($remove_id, array_column($_SESSION['carrinho'], 'id'));

    // Remove o produto do carrinho
    if ($index !== false) {
        unset($_SESSION['carrinho'][$index]);
    }
}

// Calcular o total da compra
$total = array_reduce(
    $_SESSION['carrinho'],
    function ($carry, $item) {
        return $carry + ($item['preco'] * $item['quantidade']);
    },
    0
);

// Converte o carrinho para JSON
$carrinho_json = json_encode($_SESSION['carrinho']);

// Obtém ou gera o identificador único do usuário (pode ser um UUID, por exemplo)
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : uniqid();

// Atualiza o identificador na sessão
$_SESSION['id_usuario'] = $id_usuario;

// Insere ou atualiza o carrinho no banco de dados
$query = "INSERT INTO carrinho (id_usuario, carrinho_json) VALUES (?, ?)
          ON DUPLICATE KEY UPDATE carrinho_json = VALUES(carrinho_json)";
$stmt = $conexao->prepare($query);

// Verificar se a preparação da consulta foi bem-sucedida
if ($stmt === false) {
    die("Preparação da consulta falhou: " . $conexao->error);
}

$stmt->bind_param("is", $_SESSION['id_usuario'], $carrinho_json);

// Verificar se a execução da consulta foi bem-sucedida
if ($stmt->execute() === false) {
    die("Erro na execução da consulta: " . $stmt->error);
}

$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prosseguir_compra'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $nome_pedido = $item['nome'];
        $quantidade_pedido = $item['quantidade'];
        $preco_pedido = $item['preco'];

        // Inserir informações na tabela "pedidos"
        $stmt = $conexao->prepare("INSERT INTO pedidos (nome_pedido, quantidade_pedido, preco_pedido) VALUES (?, ?, ?)");

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            die("Preparação da consulta falhou: " . $conexao->error);
        }

        $stmt->bind_param("sid", $nome_pedido, $quantidade_pedido, $preco_pedido);

        // Verificar se a execução da consulta foi bem-sucedida
        if ($stmt->execute() === false) {
            die("Erro na execução da consulta: " . $stmt->error);
        }

        $stmt->close();
    }

    // Limpar o carrinho após a compra
    $_SESSION['carrinho'] = array();

    // Redirecionar para uma página de confirmação ou agradecimento
    header("Location: finalizar.php");
    exit();
}

// Exibe os itens no carrinho
echo '<h1>Carrinho de Compras</h1>';

if (empty($_SESSION['carrinho'])) {
    echo '<p>Seu carrinho está vazio.</p>';
    echo '<form action="catalogo1.php" method="get">';
    echo '<input type="submit" value="Voltar ao Catálogo">';
    echo '</form>';
} else {
    echo '<table border="1">';
    echo '<tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Ação</th></tr>';
    foreach ($_SESSION['carrinho'] as $item) {
        echo '<tr>';
        echo '<td>' . $item['nome'] . '</td>';
        echo '<td>R$' . number_format($item['preco'], 2) . '</td>';
        echo '<td>' . $item['quantidade'] . '</td>';
        echo '<td>';
        echo '<form action="carrinho.php" method="post">';
        echo '<input type="hidden" name="remove_id" value="' . $item['id'] . '">';
        echo '<input type="submit" value="Remover">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<p>Total: R$' . number_format($total, 2) . '</p>';

    // Adiciona botões "Voltar ao Catálogo" e "Finalizar Compra"
    echo '<form action="catalogo1.php" method="get">';
    echo '<input type="submit" value="Voltar ao Catálogo">';
    echo '</form>';
    echo '<form action="finalizar.php" method="post">';
    echo '<input type="submit" name="prosseguir_compra" value="Finalizar Compra">';
    echo '</form>';
}

$conexao->close();
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