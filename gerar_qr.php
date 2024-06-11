<?php
// Recupere o ID do serviço
$idos = $_POST['idos'];

// Texto que será codificado no código QR
$texto_qr = 'ID do Serviço: ' . $idos;

// Gerar o código QR como uma imagem
$qr_code = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($texto_qr) . '" alt="Código QR">';

// Exibe o código QR na página
echo $qr_code;
?>
