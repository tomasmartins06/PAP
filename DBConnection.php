<?php

// Nome da base de dados
$db_name = 'pap';

// Conexão à base de dados usando mysqli_connect
$link = mysqli_connect('localhost', 'root', '', $db_name);

// Verifica se a conexão foi bem-sucedida
if (!$link) {
    // Caso não consiga conectar, mostra uma mensagem de erro e termina o script
    die('Não foi possível conectar: ' . mysqli_connect_error());
}

// Se a conexão for bem-sucedida, o objeto $link contém a conexão ativa com a base de dados

?>
