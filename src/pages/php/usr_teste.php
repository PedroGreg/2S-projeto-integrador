<?php 
session_start();
if (!isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] == false) {
    header("location: ./login.php");
    exit();
}
try {
    $id = $_SESSION["id"];
    require_once("../php/conn.php");
    $sql = "SELECT * FROM chamados WHERE id_usuario = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $chamados = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}
if($query->rowCount() > 0) {
$meuschamados = $query->rowCount();
}
?>