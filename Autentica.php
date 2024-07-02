<?php
// Inicia a sessão para poder utilizar variáveis de sessão
session_start();

// Inclui o ficheiro de ligação à base de dados
include 'DBConnection.php';

// Obtém o utilizador e a palavra-passe enviados através do método POST
$user = $_POST['user'];
$pass = $_POST['pass'];

// Verifica se algum dos campos está vazio
if (empty($user) || empty($pass)) {
    $_SESSION['erro'] = 1;
    // Redireciona de volta para o formulário com um código de erro na URL
    header("Location: index.php?erro=1");
    exit();
}
  
// Executa a consulta SQL para verificar se existe um utilizador com o nome de utilizador e palavra-passe fornecidos
$sql = mysqli_query($link, "SELECT id FROM utilizadores WHERE user = '$user' AND pass = '$pass'");

// Verifica se foi encontrado algum registo na base de dados
if (mysqli_num_rows($sql) > 0) {
    // Obtém o id do utilizador
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];

    // Guarda o id do utilizador na sessão e indica que não houve erros
    $_SESSION['iduser'] = $id;
    $_SESSION['erro'] = 0;

    // Redireciona para a página adequada com base no id do utilizador
    if ($id == 0) {
        header("Location: admin.php");
    } else {
        header("Location: user.php");
    }
} else {
    // Se não houver correspondência na base de dados, define um erro na sessão e redireciona de volta para o formulário
    $_SESSION['erro'] = 1;
    header("Location: index.php?erro=1");
}

// Fecha a ligação à base de dados
mysqli_close($link);
?>
