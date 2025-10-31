<?php 
session_start();
if (!isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] == false) {
    header("location: ./login.php");
    exit();
}
try {
    $status = ['aberto', 'em atendimento', 'finalizado'];

    $id = $_SESSION["id"];
    require_once("../php/conn.php");
    $sql = "SELECT * FROM chamados WHERE id_usuario = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $chamados = $query->fetchAll(PDO::FETCH_ASSOC);
    if($query->rowCount() > 0) {
        $meuschamados = $query->rowCount();
    }
    
    $sql = "SELECT * FROM chamados c WHERE id_usuario = :id AND c.status = :stat";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->bindParam(":stat", $status['2'], PDO::PARAM_STR);
    $query->execute();
    $chamadosfin = $query->fetchAll(PDO::FETCH_ASSOC);
    if($query->rowCount() > 0) {
        $chamadosfinalizados = $query->rowCount();
    }

} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}

?>