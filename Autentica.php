<?php
// CONECTA COM A BASE DE DADOS
include 'DBConnection.php';

// RECEBE OS DADOS DO FORMULÁRIO
$user = $_POST['user'];
$pass = $_POST['pass'];

// VERIFICA no banco de dados
$sql = mysqli_query($link, "SELECT * FROM utilizadores WHERE user = '$user' AND pass = '$pass'") or die("ERRO NO COMANDO SQL");

// LINHAS AFETADAS PELA CONSULTA
$row = mysqli_num_rows($sql);

// VERIFICA SE DEVOLVEU ALGO
if ($row == 0) {
    // Exibe um alerta em JavaScript se as credenciais estiverem erradas
    echo '<script>alert("Nome de usuário ou senha incorretos. Tente novamente.");</script>';
    session_start();
    $pag = 'user.php?erro=1';
    $_SESSION['erro'] = 1;
    Header("Location:$pag");
} else {
    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

    $id = $row['id'];
    // INICIALIZA A SESSÃO
    session_start();

    // GRAVA AS VARIÁVEIS NA SESSÃO
    $_SESSION['iduser'] = $id;
    $_SESSION['erro'] = 0;

    if ($id == 0) {
        Header("Location: admin.php");
    } else {
        Header("Location: user.php");
    }
}
?>