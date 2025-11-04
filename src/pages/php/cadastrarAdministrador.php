<?php
session_start();
if (!isset($_POST["submit"]) || strlen($_POST["codigo"]) != 8 || !isset($_POST["email"]) || !isset($_POST["senha"])) {
    $_SESSION["mensagem_erro"] = "Erro no cadastro, verifique as informações";
    header("location:../html/cadastrar_administrador.php");
    exit();
}
unset($_SESSION["mensagem_erro"]);
if (
    strlen($_POST["nome"]) > 0 &&
    strlen($_POST["nome"]) <= 255 &&
    strlen($_POST["email"]) > 0 &&
    strlen($_POST["email"]) <= 255 &&
    strlen($_POST["senha"]) > 0 &&
    strlen($_POST["senha"]) <= 255 &&
    filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)
) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
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
            $sql = "INSERT INTO administradores (id_empresa,nome,email,senha,ativo) VALUES (:IDE,:nome,:email,:senha,:ativo)";
            $query = $pdo->prepare($sql);
            $query->bindParam(":IDE", $IDE, PDO::PARAM_INT);
            $query->bindParam(":nome", $nome, PDO::PARAM_STR);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->bindParam(":senha", $senha, PDO::PARAM_STR);
            $query->bindParam(":ativo", $ativo, PDO::PARAM_INT);
            $query->execute();
            $_SESSION["mensagem_sucesso"] = "Administrador cadastrado com sucesso";
            header("location: ../html/adm_cadastrar_administrador.php");
            exit();
        } else {
            $_SESSION["mensagem_erro"] = "Código da empresa incorreto";
            header("location:../html/adm_cadastrar_administrador.php");
            exit();
        }
    } catch (PDOException $e) {
        echo 'Erro:' . $e->getMessage();
    }
}
?>