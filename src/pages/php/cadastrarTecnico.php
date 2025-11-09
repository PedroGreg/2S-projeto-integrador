<?php
session_start();
if (!isset($_POST["submit"]) || strlen($_POST["codigo"]) != 6 || !isset($_POST["email"]) || !isset($_POST["senha"])) {
    $_SESSION["mensagem_erro"] = "Erro no cadastro, verifique as informações";
    header("location:../html/adm_cadastrar_tecnico.php");
    exit();
}
unset($_SESSION["mensagem_erro"]);
$regex_nome = "/^[A-Za-zÀ-ü]+(\s[A-Za-zÀ-ü]+)+$/";
if (
    strlen($_POST["nome"]) > 0 &&
    strlen($_POST["nome"]) <= 255 &&
    strlen($_POST["email"]) > 0 &&
    strlen($_POST["email"]) <= 255 &&
    strlen($_POST["senha"]) > 7 &&
    strlen($_POST["senha"]) <= 255 &&
    preg_match($regex_nome, $_POST['nome']) &&
    filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)
) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $email = strtolower(trim($_POST['email']));
    $senha = $_POST['senha'];
    $ativo = $_POST['ativo'];
    require_once('./conn.php');
    try {
        $sqlEmpresa = "SELECT * FROM empresas WHERE codigo = :codigo";
        $testeCodigo = $pdo->prepare($sqlEmpresa);
        $testeCodigo->bindParam(":codigo", $codigo, PDO::PARAM_INT);
        $testeCodigo->execute();
        if ($testeCodigo->rowCount() == 1) {
            $resultado = $testeCodigo->fetch(PDO::FETCH_ASSOC);
            $IDE = $resultado["id_empresa"];
            $sql = "INSERT INTO tecnicos (id_empresa,nome,email,senha,ativo) VALUES (:IDE,:nome,:email,:senha,:ativo)";
            $query = $pdo->prepare($sql);
            $query->bindParam(":IDE", $IDE, PDO::PARAM_INT);
            $query->bindParam(":nome", $nome, PDO::PARAM_STR);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->bindParam(":senha", $senha, PDO::PARAM_STR);
            $query->bindParam(":ativo", $ativo, PDO::PARAM_INT);
            $query->execute();
            $_SESSION["mensagem_sucesso"] = "Tecnico cadastrado com sucesso";
            header("location: ../html/adm_cadastrar_tecnico.php");
            exit();
        } else {
            $_SESSION["mensagem_erro"] = "Código da empresa incorreto";
            header("location:../html/adm_cadastrar_tecnico.php");
            exit();
        }
    } catch (PDOException $e) {
        echo 'Erro:' . $e->getMessage();
    }
}else{
    $_SESSION["mensagem_erro"] = "Verifique as informações";
    header('location: ../html/adm_cadastrar_tecnico.php');
    exit();
}
?>