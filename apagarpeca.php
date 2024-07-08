<?php
include 'DBConnection.php';
include 'log_function.php';

// Verifica se o método é POST e se o ID foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Consulta para obter o nome da peça
        $query_peca = "SELECT nome FROM pecas WHERE idp = $id";
        $result_peca = mysqli_query($link, $query_peca);

        if ($result_peca && $peca_row = mysqli_fetch_assoc($result_peca)) {
            $nome_peca = $peca_row['nome'];

            // Query SQL para Apagar o registo com base no ID
            $sql = "DELETE FROM pecas WHERE idp = $id";

            if ($link->query($sql) === TRUE) {
                // Regista o log da exclusão da peça com o nome da peça
                $acao = "Exclusão da Peça: ID $id, Nome: $nome_peca";
                registar_log($link, $acao);

                // Redirecionar para a página de listar após a exclusão
                header("Location: listar_peca.php");
                exit();
            } else {
                echo "Erro ao Apagar o registo: " . $link->error;
            }
        } else {
            echo "Erro ao obter dados da peça: " . mysqli_error($link);
        }

        // Liberar o resultado da consulta da peça
        mysqli_free_result($result_peca);
    } else {
        echo "ID do registo não é válido.";
    }
} else {
    echo "ID do registo não fornecido.";
}

$link->close();
?>
