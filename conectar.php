<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'site_cupcake';


$conexao = new MYSQLI($host, $usuario, $senha, $banco);

if($conexao -> connect_errno){
    echo "Error de conexão com o banco de dados";
}

else{
   
}
?>