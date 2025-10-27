<?php 
session_start();
if ((isset($_SESSION['nome']) == true) && (isset($_SESSION['senha']) == true)) {
    $logado = $_SESSION['nome'];
} else {
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: ../login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    CONECTADO
</body>
</html>