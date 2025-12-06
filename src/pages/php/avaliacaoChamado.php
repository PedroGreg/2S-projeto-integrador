<?php
session_start();
if (!isset($_POST["submit"]) || !isset($_POST["nota"]) || !isset($_GET['id_chamado'])) {
    header("location: ../html/usr_chamados_finalizados.php");
    exit();
}
try {
    $id = $_GET["id_chamado"];
    $nota = $_POST["nota"];
    require_once("./conn.php");
    $sql = "UPDATE chamados c SET avaliacao = :nota WHERE id_chamado = :id;";
    $query = $pdo->prepare($sql);
    $query->bindParam(":nota", $nota, PDO::PARAM_INT);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();
    header("location: ../html/usr_chamados_finalizados.php");
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}