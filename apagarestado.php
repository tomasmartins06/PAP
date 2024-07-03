<?php
include 'DBConnection.php';

// Verifica se o método é POST e se o ID foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Query SQL para Apagar o registo com base no ID
        $sql = "DELETE FROM estado WHERE idt = $id";

        if ($link->query($sql) === TRUE) {
            // Redirecionar para a página de listar após a exclusão
            header("Location: listar_estado.php");
            exit();
        } else {
            echo "Erro ao Apagar o registo: " . $link->error;
        }
    } else {
        echo "ID do registo não é válido.";
    }
} else {
    echo "ID do registo não fornecido.";
}

$link->close();
?>
 