<?php
// Incluir o ficheiro de conexão com o base de dados e a função de log
include 'DBConnection.php';
include 'log_function.php';

// Verificar se o método é POST e se o campo "id" foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Capturar e validar o ID do log
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Consulta para obter os dados do log com base no ID
        $query = "SELECT * FROM logs WHERE id = $id";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $acao = $row['acao'];
            $data = $row['data'];
            $utilizador = $row['utilizador'];

            // Query SQL para apagar o log com base no ID
            $sql = "DELETE FROM logs WHERE id = $id";

            if ($link->query($sql) === TRUE) {
                // Registro do log da exclusão do log
                $acao_log = "Exclusão do log: ID $id, Ação: $acao, Data: $data, Utilizador: $utilizador";
                registar_log($link, $acao_log);

                // Redirecionar para a página de listar logs após a exclusão
                header("Location: logs.php");
                exit();
            } else {
                echo "Erro ao Apagar o log: " . $link->error;
            }
        } else {
            echo "Log não encontrado com o ID: $id";
        }

        // Liberar o resultado da consulta
        mysqli_free_result($result);
    } else {
        echo "ID do log não é válido.";
    }
} else {
    echo "ID do log não fornecido.";
}

$link->close();
?>
