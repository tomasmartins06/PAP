<?php
include 'DBConnection.php';
include 'log_function.php';

// Verifica se o método é POST e se o ID foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Consulta para obter o nome do eletrodoméstico
        $query_eletrodomestico = "SELECT eletrodomestico FROM eletrodomesticos WHERE ide = $id";
        $result_eletrodomestico = mysqli_query($link, $query_eletrodomestico);

        if ($result_eletrodomestico && $eletrodomestico_row = mysqli_fetch_assoc($result_eletrodomestico)) {
            $nome_eletrodomestico = $eletrodomestico_row['eletrodomestico'];

            // Query SQL para Apagar o registo com base no ID
            $sql = "DELETE FROM eletrodomesticos WHERE ide = $id";

            if ($link->query($sql) === TRUE) {
                // Registra o log da exclusão do eletrodoméstico com o nome do produto
                $acao = "Exclusão do produto: ID $id, Nome: $nome_eletrodomestico";
                registar_log($link, $acao);

                // Redirecionar para a página de listar após a exclusão
                header("Location: listar_produto.php");
                exit();
            } else {
                echo "Erro ao Apagar o registo: " . $link->error;
            }
        } else {
            echo "Erro ao obter dados do eletrodoméstico: " . mysqli_error($link);
        }

        // Liberar o resultado da consulta do eletrodoméstico
        mysqli_free_result($result_eletrodomestico);
    } else {
        echo "ID do registo não é válido.";
    }
} else {
    echo "ID do registo não fornecido.";
}

$link->close();
?>
