<?php
session_start();
if (!isset($_POST["submit"]) || !isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["senha"]) || !isset($_POST["confirm"]) || $_POST['senha'] !== $_POST['confirm']) {
    $_SESSION["mensagem_erro"] = "DADOS INCORRETOS";
    header("location: ../html/cadastro.php");
    exit();
}
unset($_SESSION["mensagem_erro"]);
$regex_nome = "/^[À-ü]+$/";
if(strlen($_POST["nome"]) > 0 && 
    strlen($_POST["nome"]) <= 255 &&
    strlen($_POST["email"]) > 0 &&
    strlen($_POST["email"]) <= 255 &&
    strlen($_POST["senha"]) > 0 &&
    strlen($_POST["senha"]) <= 255 &&
    preg_match($regex_nome, $_POST['nome']) &&
    filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        require_once "./conn.php";
        try {
        $nome = $_POST['nome'];
        $email = strtolower(trim($_POST['email']));
        $senha = $_POST['senha'];
        $ativo = 1;
        $sql = "INSERT INTO usuarios (id_empresa,nome,email,senha,ativo) VALUES (:IDE,:nome,:email,:senha,:ativo);";
        $query = $pdo->prepare($sql);
        $query->bindParam(':IDE', $_SESSION['IDE'], PDO::PARAM_INT);
        $query->bindParam(':nome', $nome, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':senha', $senha, PDO::PARAM_STR);
        $query->bindParam(':ativo', $ativo, PDO::PARAM_INT);
        $query->execute();
        header('location:../html/login.php');
        exit();
        } catch (PDOException $e) {
            echo 'Erro ao gravar os dados no banco de dados' . $e->getMessage();
        }
        } else {
        header("location:../html/cadastro.php");
        exit();
    }
?>
