<?php
session_start();
if (!isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] == false) {
    header("location: ../html/login.php");
    exit();
}
require_once('./conn.php');
try {
    $sql = "INSERT INTO mensagens (id_chamado,mensagem_usuario) VALUES (:id,:mensagem)";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $_GET['id_chamado'], PDO::PARAM_INT);
    $query->bindParam(":mensagem", $_POST['resposta'], PDO::PARAM_STR);
    $query->execute();
    $sql = "UPDATE chamados c SET status = 'aberto' WHERE id_chamado = :id AND c.status = 'pendente'";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $_GET['id_chamado'], PDO::PARAM_INT);
    $query->execute();
    header('location: ../html/usr_chamados_pendentes.php');
    exit();
} catch (PDOException $e) {
    echo 'erro ' . $e->getMessage();
}
?>