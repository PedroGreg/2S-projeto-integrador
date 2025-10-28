<?php
session_start();
try {
    require_once('./conn.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $ativo = 1;
    $user = "SELECT * FROM usuarios WHERE email = :useremail AND senha = :usersenha AND ativo = 1";
    $admin = "SELECT * FROM administradores WHERE email = :adminemail AND senha = :adminsenha AND ativo = 1";
    $query1 = $pdo->prepare($user);
    $query1->bindParam(':useremail', $email, PDO::PARAM_STR);
    $query1->bindParam(':usersenha', $senha, PDO::PARAM_STR);
    $query1->execute();
    $query2 = $pdo->prepare($admin);
    $query2->bindParam(':adminemail', $email, PDO::PARAM_STR);
    $query2->bindParam(':adminsenha', $senha, PDO::PARAM_STR);
    $query2->execute();
    if ($query2->rowCount() > 0) {
        $_SESSION['admin_logado'] = true;
        $administrador = $query2->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $administrador['id_administrador'];
        $_SESSION['usuario_logado'] = false;
        header('location: ../html/chamados_abertos.php');
        unset($_SESSION['mensagem_erro']);
        exit();
    } elseif ($query1->rowCount() > 0) {
        $_SESSION['usuario_logado'] = true;
        $usuario = $query1->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $usuario['id_usuario'];
        $_SESSION['admin_logado'] = false;
        header('location: ../html/usr_meus_chamados.php');
        unset($_SESSION['mensagem_erro']);
        exit();
    } else {
        $_SESSION['admin_logado'] = false;
        unset($_SERVER['id']);
        $_SESSION['usuario_logado'] = false;
        $_SESSION['mensagem_erro'] = "Email e/ou senha incorretos.";
        header('location: ../html/login.php');
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao autenticar" . $e->getMessage();
}
?>