<?php
// Incluir o ficheiro de conexão com o base de dados e a função de log
include 'DBConnection.php';
include 'log_function.php';

// Verificar se o método é POST e se o campo "idf" foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idf'])) {
    // Capturar e validar o ID do fornecedor
    $idf = intval($_POST['idf']);

    if ($idf > 0) {
        // Consulta para obter o nome do fornecedor
        $query = "SELECT nome FROM fornecedores WHERE idf = $idf";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $nome_fornecedor = $row['nome'];

            // Query SQL para apagar o fornecedor com base no ID
            $sql = "DELETE FROM fornecedores WHERE idf = $idf";

            if ($link->query($sql) === TRUE) {
                // Registro do log da exclusão do fornecedor com nome
                $acao = "Exclusão do Fornecedor: ID $idf, Nome: $nome_fornecedor";
                registar_log($link, $acao);

                // Redirecionar para a página de listar após a exclusão
                header("Location: listar_fornecedor.php");
                exit();
            } else {
                echo "Erro ao Apagar o registo: " . $link->error;
            }
        } else {
            echo "Fornecedor não encontrado com o ID: $idf";
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

?>
