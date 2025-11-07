<?php 
session_start();
require_once("../php/conn.php");

if (!isset($_SESSION['admin_logado'])){
    header('Location:../html/login.php');
    exit();
}

$id_user = $_GET['id_usuario'] ?? null;

if(!$id_user) {
    header('Location: ../html/adm_usuarios.php');
    exit();
    }
    try {
        $stmt = $pdo->prepare('UPDATE chamados SET id_usuario = NULL WHERE id_usuario = :id_usuario');
        $stmt->bindParam(':id_usuario', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $pdo->prepare('DELETE  FROM  usuarios WHERE id_usuario = :id_usuario');
        $stmt->bindParam(':id_usuario', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../html/adm_usuarios.php');
        exit();

    } catch(PDOException $e){
         echo "<p style='color:red;'>Erro ao excluir usuarios: " . $e->getMessage() . "</p>";

    }



?>