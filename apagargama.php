<?php
include 'DBConnection.php';
include 'log_function.php';

// Verifica se o método é POST e se o ID foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Consulta para obter o nome da gama
        $query_gama = "SELECT gama FROM gama WHERE idi = $id";
        $result_gama = mysqli_query($link, $query_gama);

        if ($result_gama && $gama_row = mysqli_fetch_assoc($result_gama)) {
            $nome_gama = $gama_row['gama'];

            // Query SQL para Apagar o registo com base no ID
            $sql = "DELETE FROM gama WHERE idi = $id";

            if ($link->query($sql) === TRUE) {
                // Regista o log da exclusão da gama com o nome da gama
                $acao = "Exclusão da Gama: ID $id, Nome: $nome_gama";
                registar_log($link, $acao);

                // Redirecionar para a página de listar após a exclusão
                header("Location: listar_gama.php");
                exit();
            } else {
                echo "Erro ao Apagar o registo: " . $link->error;
            }
        } else {
            echo "Erro ao obter dados da gama: " . mysqli_error($link);
        }

        // Liberar o resultado da consulta da gama
        mysqli_free_result($result_gama);
    } else {
        echo "ID do registo não é válido.";
    }
} else {
    echo "ID do registo não fornecido.";
}

$link->close();
?>
