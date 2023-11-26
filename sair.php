<?php

//Criar uma sessão

session_start();

//destruir as variaveis

unset($_SESSION['email_cliente']);
unset($_SESSION['senha_cliente']);

//direcionamente para a página inicial

header('Location:index.html');

?>