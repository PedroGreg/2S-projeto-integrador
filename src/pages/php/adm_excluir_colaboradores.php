<?php 
session_start();
require_once("../php/conn.php");

if (!isset($_SESSION['tecnico_logado'])){
    header('Location:login.php');
    exit();
}

$id_tec = $_GET['id_tecnico'] ?? null;

if(!$id_tec) {
    header('Location: adm_colaboradores.php');
    exit();
    }
    try {
        $stmt = $pdo->prepare('DELETE  FROM  tecnicos WHERE id_tecnico = :id_tecnico');
        $stmt->bindParam(':id_tecnico', $id_tec, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: adm_colaboradores.php');
        exit();

    } catch(PDOException $e){
         echo "<p style='color:red;'>Erro ao excluir colaborador: " . $e->getMessage() . "</p>";

    }



?>