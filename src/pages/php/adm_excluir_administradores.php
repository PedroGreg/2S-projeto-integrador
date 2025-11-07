<?php 
session_start();
require_once("../php/conn.php");

if (!isset($_SESSION['admin_logado'])){
    header('Location:../html/login.php');
    exit();
}

$id_admin = $_GET['id_administrador'] ?? null;

if(!$id_admin) {
    header('Location: ../html/adm_administradores.php');
    exit();
    }
    try {
        $stmt = $pdo->prepare('DELETE  FROM  administradores WHERE id_administrador = :id_administrador');
        $stmt->bindParam(':id_administrador', $id_admin, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../html/adm_administradores.php');
        exit();

    } catch(PDOException $e){
         echo "<p style='color:red;'>Erro ao excluir administrador: " . $e->getMessage() . "</p>";

    }



?>