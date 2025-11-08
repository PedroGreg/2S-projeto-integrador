<?php
session_start();
if (!isset($_POST["submit"]) || !isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["senha"]) || !isset($_POST["confirm"]) || $_POST['senha'] !== $_POST['confirm']) {
    $_SESSION["mensagem_erro"] = "DADOS INCORRETOS";
    header("location: ../html/cadastro.php");
    exit();
}
unset($_SESSION["mensagem_erro"]);
$regex_nome = "/^[A-Za-zÀ-ü]+(\s[A-za-zÀ-ü]+)+$/";
$_SESSION['nomecad'] = $_POST["nome"];
$_SESSION['emailcad'] = $_POST["email"];
if (
    strlen($_POST["nome"]) > 3 &&
    strlen($_POST["nome"]) <= 255 &&
    strlen($_POST["email"]) > 0 &&
    strlen($_POST["email"]) <= 255 &&
    filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) &&
    preg_match($regex_nome, $_POST['nome']) &&
    strlen($_POST["senha"]) > 7 &&
    strlen($_POST["senha"]) <= 35
) {
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
} elseif (strlen($_POST["nome"]) <= 3 || strlen($_POST["nome"]) > 255) {
    $_SESSION['mensagem_erro'] = "O nome deve ter entre 4 e 255 letras";
    header("location:../html/cadastro.php");
    exit();
} elseif (!preg_match($regex_nome, $_POST['nome'])) {
    $_SESSION['mensagem_erro'] = "O nome deve ter pelo menos um nome e sobrenome!";
    header("location:../html/cadastro.php");
    exit();
} elseif (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    $_SESSION['mensagem_erro'] = "Insira um email válido!";
    header("location:../html/cadastro.php");
    exit();

} elseif (strlen($_POST["senha"]) <= 7 || strlen($_POST["senha"]) > 35) {
    $_SESSION['mensagem_erro'] = "A senha deve ter entre 8 e 35 digitos/caracteres!";
    header("location:../html/cadastro.php");
    exit();
} else {
    $_SESSION['mensagem_erro'] = "Verifique as informações";
    header("location:../html/cadastro.php");
    exit();
}
?>