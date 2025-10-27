<?php
session_start();
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && (isset($_POST['senha']))) {
        include_once('../conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        $result = $conexao->query($sql);

        // print_r($result);
        if ($result->num_rows < 1) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ./login.php');

        } else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../sistema/sistema.php');

        }

    }
} else {
    header('Location: ./login.php');
}
?>