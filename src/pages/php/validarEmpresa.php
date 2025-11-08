<?php
session_start();
$regex_empresa = "/^[0-9]{6}$/";
if (!isset($_POST["submit"]) || !isset($_POST["codigo"]) || strlen($_POST["codigo"]) != 6 || !preg_match($regex_empresa, $_POST["codigo"])) {
    $_SESSION["mensagem_erro"] = "DADOS INCORRETOS";
    header("location: ../html/identificarEmpresa.php");
    exit();
}
unset($_SESSION["mensagem_erro"]);
require_once "./conn.php";
try {
    $codigo = $_POST["codigo"];
    $sql = "SELECT * FROM empresas WHERE codigo = :codigo";
    $query = $pdo->prepare($sql);
    $query -> bindParam(':codigo', $codigo, PDO::PARAM_INT);
    $query -> execute();
    if ($query ->rowCount() == 1) {
        $empresa = $query -> fetch(PDO::FETCH_ASSOC);
        $_SESSION['empresa'] = $empresa['empresa'];
        $_SESSION['IDE'] = $empresa['id_empresa'];
        header('location: ../html/cadastro.php');
        exit();
    }else{
        unset($_SESSION['empresa']);
        unset($empresa);
        $_SESSION['mensagem_erro'] = 'Empresa Incorreta';
        header('location: ../html/identificarEmpresa.php');
        exit();
    }
} catch (PDOException $e) {
    echo 'erro ao identificar e empresa' . $e->getMessage();
    exit();
}
?>