<?php
include 'DBConnection.php';

// Verifica se o método é POST e se o ID foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Query SQL para excluir o registro com base no ID
        $sql = "DELETE FROM clientes WHERE idc = ?";

        // Preparação da declaração
        $stmt = $link->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            // Redirecionar para a página de listar após a exclusão
            header("Location: listar_clientes.php");
            exit();
        } else {
            echo "Erro ao excluir o registro: " . $link->error;
        }

        $stmt->close();
    } else {
        echo "ID do registro não é válido.";
    }
} else {
    echo "ID do registro não fornecido.";
}

$link->close();
?>