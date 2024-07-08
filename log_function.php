<?php
function registar_log($link, $acao) {
    // Verifica se a sessão já foi iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $utilizador_id = $_SESSION['iduser'];

    // Obter o nome do Utilizador a partir do ID
    $result = mysqli_query($link, "SELECT user FROM utilizadores WHERE id = '$utilizador_id'");
    $row = mysqli_fetch_assoc($result);
    $utilizador_nome = $row['user'];

    // Consulta para obter o próximo ID disponível na tabela de logs
    $result = mysqli_query($link, "SELECT MAX(id) AS max_id FROM logs");
    $row = mysqli_fetch_assoc($result);
    $proximo_id = $row['max_id'] + 1;

    // Inserir ação no log com o próximo ID disponível
    $sql = "INSERT INTO logs (id, acao, utilizador) VALUES ('$proximo_id', '$acao', '$utilizador_nome')";
    mysqli_query($link, $sql);
}
?>
