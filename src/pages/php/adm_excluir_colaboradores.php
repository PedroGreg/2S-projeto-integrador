<?php
session_start();
require_once("../php/conn.php");

if (!isset($_SESSION['admin_logado'])) {
    header('Location:../html/login.php');
    exit();
}

$id_tec = $_GET['id_tecnico'] ?? null;

if (!$id_tec) {
    header('Location: ../html/adm_colaboradores.php');
    exit();
}
try {
    $stmt = $pdo->prepare('UPDATE chamados SET id_tecnico = NULL WHERE id_tecnico = :id_tecnico');
    $stmt->bindParam(':id_tecnico', $id_tec, PDO::PARAM_INT);
    $stmt->execute();
    $stmt = $pdo->prepare('DELETE  FROM  tecnicos WHERE id_tecnico = :id_tecnico');
    $stmt->bindParam(':id_tecnico', $id_tec, PDO::PARAM_INT);
    $stmt->execute();
    header('Location: ../html/adm_colaboradores.php');
    exit();

} catch (PDOException $e) {
    echo "<p style='color:red;'>Erro ao excluir colaborador: " . $e->getMessage() . "</p>";

}



?>