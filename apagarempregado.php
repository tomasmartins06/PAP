<?php
// Incluir o ficheiro de conexão com o base de dados e a função de log
include 'DBConnection.php';
include 'log_function.php';

// Verificar se o método é POST e se o campo "id" foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Capturar e validar o ID do empregado
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Consulta para obter o nome do empregado
        $query = "SELECT nome FROM utilizadores WHERE id = $id";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $nome_empregado = $row['nome'];

            // Query SQL para apagar o empregado com base no ID
            $sql = "DELETE FROM utilizadores WHERE id = $id";

            if ($link->query($sql) === TRUE) {
                // Registro do log da exclusão do empregado com nome
                $acao = "Exclusão do empregado: ID $id, Nome: $nome_empregado";
                registar_log($link, $acao);

                // Redirecionar para a página de listar após a exclusão
                header("Location: listar_empregado.php");
                exit();
            } else {
                echo "Erro ao Apagar o registo: " . $link->error;
            }
        } else {
            echo "Empregado não encontrado com o ID: $id";
        }

        // Liberar o resultado da consulta
        mysqli_free_result($result);
    } else {
        echo "ID do registo não é válido.";
    }
} else {
    echo "ID do registo não fornecido.";
}

$link->close();
?>
