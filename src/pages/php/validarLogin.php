<?php
session_start();
try {
    require_once('./conn.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $ativo = 1;
    $user = "SELECT * FROM usuarios WHERE email = :useremail AND senha = :usersenha AND ativo = 1";
    $admin = "SELECT * FROM administradores WHERE email = :adminemail AND senha = :adminsenha AND ativo = 1";
    $tecnicos = "SELECT * FROM tecnicos WHERE email = :tecemail AND senha = :tecsenha AND ativo = 1";
    $query1 = $pdo->prepare($admin);
    $query1->bindParam(':adminemail', $email, PDO::PARAM_STR);
    $query1->bindParam(':adminsenha', $senha, PDO::PARAM_STR);
    $query1->execute();
    $query2 = $pdo->prepare($tecnicos);
    $query2->bindParam(':tecemail', $email, PDO::PARAM_STR);
    $query2->bindParam(':tecsenha', $senha, PDO::PARAM_STR);
    $query2->execute();
    $query3 = $pdo->prepare($user);
    $query3->bindParam(':useremail', $email, PDO::PARAM_STR);
    $query3->bindParam(':usersenha', $senha, PDO::PARAM_STR);
    $query3->execute();
    if ($query1->rowCount() > 0) {
        $_SESSION['admin_logado'] = true;
        $administrador = $query1->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $administrador['id_administrador'];
        $_SESSION['usuario_logado'] = NULL;
        $_SESSION['tecnico_logado'] = NULL;
        header('location: ../html/tec_chamados_abertos.php');
        unset($_SESSION['mensagem_erro']);
        exit();
    } elseif ($query2->rowCount() > 0) {
        $_SESSION['tecnico_logado'] = true;
        $tecnico = $query2->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $tecnico['id_tecnico'];
        $_SESSION['usuario_logado'] = NULL;
        $_SESSION['admin_logado'] = NULL;
        header('location:../html/tec_chamados_abertos.php');
        unset($_SESSION['mensagem_erro']);
        exit();
    } elseif ($query3->rowCount() > 0) {
        $_SESSION['usuario_logado'] = true;
        $usuario = $query3->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $usuario['id_usuario'];
        $_SESSION['admin_logado'] = NULL;
        $_SESSION['tecnico_logado'] = NULL;
        header('location: ../html/usr_meus_chamados.php');
        unset($_SESSION['mensagem_erro']);
        exit();
    } else {
        unset($_SERVER['id']);
        $_SESSION['admin_logado'] = NULL;
        $_SESSION['usuario_logado'] = NULL;
        $_SESSION['tecnico_logado'] = NULL;
        $_SESSION['mensagem_erro'] = "Email e/ou senha incorretos.";
        header('location: ../html/login.php');
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao autenticar" . $e->getMessage();
}
?>