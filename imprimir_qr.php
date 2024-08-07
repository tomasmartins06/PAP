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
        .client-name {
            margin-top: 10px;
            font-size: 18px; /* Tamanho da fonte aumentado para 18px */
            font-weight: bold; /* Negrito adicionado para destacar o nome */
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
        // Verifica se os parâmetros 'idos' e 'cliente_id' foram passados na URL
        if (isset($_GET['idos']) && isset($_GET['cliente_id'])) {
            $idos = htmlspecialchars($_GET['idos']);
            $cliente_id = htmlspecialchars($_GET['cliente_id']);

            // Texto que será codificado no código QR
            $texto_qr = 'ID do Serviço: ' . $idos . ' - Cliente: ' . $cliente_id;

            // URL para gerar o código QR
            $qr_code_url = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($texto_qr);

            // Exibe o código QR
            echo '<img src="' . $qr_code_url . '" alt="Código QR" class="qr-code">';

            // Exibe o nome do cliente abaixo do código QR com tamanho maior
            echo '<div class="client-name"> Nome do Cliente'. $cliente_id . '</div>';
        } else {
            // Mensagem caso os parâmetros não sejam fornecidos
            echo '<p>Parâmetros não fornecidos.</p>';
        }
        ?>
    </div>

    <script>
        // Após a impressão, fecha a janela de impressão e redireciona para a página anterior
        window.onload = function() {
            window.print();
            window.onafterprint = function() {
                window.close();
                window.location.href = 'gerar_qr.php'; // Redireciona para a página anterior
            };
        };
    </script>
</body>
</html>
