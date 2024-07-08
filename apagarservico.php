<?php
include 'DBConnection.php';
include 'log_function.php';

// Verifica se o método é POST e se o ID foi fornecido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($id > 0) {
        // Consulta para obter cliente_id e eletrodomestico_id do serviço
        $query_servico = "SELECT cliente_id, eletrodomestico_id FROM servicos WHERE idos = $id";
        $result_servico = mysqli_query($link, $query_servico);

        if ($result_servico && $row = mysqli_fetch_assoc($result_servico)) {
            $cliente_id = $row['cliente_id'];
            $eletrodomestico_id = $row['eletrodomestico_id'];

            // Consulta para obter o nome do cliente
            $query_cliente = "SELECT nome FROM clientes WHERE idc = $cliente_id";
            $result_cliente = mysqli_query($link, $query_cliente);

            if ($result_cliente && $cliente_row = mysqli_fetch_assoc($result_cliente)) {
                $nome_cliente = $cliente_row['nome'];

                // Consulta para obter o nome do eletrodoméstico
                $query_eletrodomestico = "SELECT eletrodomestico FROM eletrodomesticos WHERE ide = $eletrodomestico_id";
                $result_eletrodomestico = mysqli_query($link, $query_eletrodomestico);

                if ($result_eletrodomestico && $eletrodomestico_row = mysqli_fetch_assoc($result_eletrodomestico)) {
                    $nome_eletrodomestico = $eletrodomestico_row['eletrodomestico'];

                    // Query SQL para Apagar o registro com base no ID
                    $sql = "DELETE FROM servicos WHERE idos = $id";

                    if ($link->query($sql) === TRUE) {
                        // Registra o log da exclusão do serviço com o nome do cliente, nome do eletrodoméstico e IDs
                        $acao = "Exclusão do serviço: ID $id, Cliente $nome_cliente, Eletrodoméstico $nome_eletrodomestico";
                        registar_log($link, $acao);

                        // Redirecionar para a página de listar após a exclusão
                        header("Location: listar_servico.php");
                        exit();
                    } else {
                        echo "Erro ao Apagar o registro: " . $link->error;
                    }
                } else {
                    echo "Erro ao obter dados do eletrodoméstico: " . mysqli_error($link);
                }

                // Liberar o resultado da consulta do eletrodoméstico
                mysqli_free_result($result_eletrodomestico);
            } else {
                echo "Erro ao obter dados do cliente: " . mysqli_error($link);
            }

            // Liberar o resultado da consulta do cliente
            mysqli_free_result($result_cliente);
        } else {
            echo "Erro ao obter dados do serviço: " . mysqli_error($link);
        }

        // Liberar o resultado da consulta do serviço
        mysqli_free_result($result_servico);
    } else {
        echo "ID do registro não é válido.";
    }
} else {
    echo "ID do registro não fornecido.";
}

$link->close();
?>
