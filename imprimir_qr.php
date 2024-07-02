<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressão do Código QR</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            text-align: center;
            width: 80mm; /* Largura do papel para impressão de 80mm */
        }
        .print-container {
            margin: 0;
            padding: 0;
            width: 100%;
            text-align: center;
        }
        .qr-code {
            width: 100%;
            max-width: 150px; /* Tamanho máximo do código QR */
            height: auto;
        }
        @media print {
            body, .print-container {
                width: 80mm; /* Largura do papel para impressão de 80mm */
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="print-container">
        <?php
        if (isset($_GET['idos'])) {
            // Recupera o ID do serviço
            $idos = htmlspecialchars($_GET['idos']); // Sanitiza a entrada

            // Texto que será codificado no código QR
            $texto_qr = 'ID do Serviço: ' . $idos;

            // URL para gerar o código QR
            $qr_code_url = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($texto_qr);

            // Exibe o código QR
            echo '<img src="' . $qr_code_url . '" alt="Código QR" class="qr-code">';
        } else {
            echo '<p>ID do serviço não fornecido.</p>';
        }
        ?>
    </div>
 
    <script>
        // Quando a página estiver carregada, chama a função para imprimir
        window.onload = function() {
            // Abre automaticamente o menu de impressão
            window.print();

            // Fecha a janela de impressão após a impressão ser completada
            window.onafterprint = function() {
                window.close();
                // Redireciona de volta para a página gerar_qr.php
                window.location.href = 'gerar_qr.php';
            };
        };
    </script>
</body>
</html>
