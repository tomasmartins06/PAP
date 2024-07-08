<?php
include 'DBConnection.php';
include 'log_function.php';

// Verifica se o método é POST e se o ID foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Consulta para obter o estado antes de excluir
        $query_estado = "SELECT estado FROM estado WHERE idt = $id";
        $result_estado = mysqli_query($link, $query_estado);

        if ($result_estado && mysqli_num_rows($result_estado) > 0) {
            $row_estado = mysqli_fetch_assoc($result_estado);
            $estado = $row_estado['estado'];

            // Query SQL para Apagar o registo com base no ID
            $sql = "DELETE FROM estado WHERE idt = $id";

            if ($link->query($sql) === TRUE) {
                // Monta a mensagem de ação para o log, incluindo o estado
                $acao = "Exclusão do estado: ID $id, Estado: $estado";
                registar_log($link, $acao);

                // Redirecionar para a página de listar após a exclusão
                header("Location: listar_estado.php");
                exit();
            } else {
                echo "Erro ao Apagar o registo: " . $link->error;
            }
        } else {
            echo "Não foi possível encontrar o estado associado ao ID $id.";
        }
    } else {
        echo "ID do registo não é válido.";
    }
} else {
    echo "ID do registo não fornecido.";
}

$link->close();
?>
