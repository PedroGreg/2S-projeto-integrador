<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        include_once('../conn.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $teste = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $resultado = $conn->query($teste);

        if ($resultado->num_rows > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['status'] = 'logado';
            // print_r($resultado);
            header('Location: ../../html/chamados_abertos.html');
        } else {
            $_SESSION['email'] = $_POST['email'];
            unset($_SESSION['senha']);
            unset($_SESSION['status']);
            // print_r($resultado);
            header('Location: ../../html/login.php');
        }
    }
} else {
    // header('Location: ../../html/login.php');
}
?>