<?php
if (isset($_GET['idos'])) {
    $idos = $_GET['idos'];
    $texto_qr = 'ID do Serviço: '. $idos;
    $qr_code = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='. urlencode($texto_qr). '" alt="Código QR" style="display: block; margin: 0 auto;">';
    echo '<div style="text-align: center;">' . $qr_code . '</div>';
} else {
    echo 'ID do serviço não fornecido.';
}
?>
