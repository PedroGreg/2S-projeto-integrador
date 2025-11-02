<?php
session_start();
if (!isset($_SESSION["admin_logado"]) || $_SESSION["admin_logado"] == false) {
    if (!isset($_SESSION['tecnico_logado']) || $_SESSION['tecnico_logado'] == false) {
        header("location: ./login.php");
        exit();
    }
}
$id = $_SESSION["id"];
require_once('../php/conn.php');
try {
    $status = ['aberto', 'atendimento', 'pendente', 'finalizado'];
    $sql = "SELECT c.id_chamado, c.id_categoria, 
    CONCAT(UPPER(LEFT(c.status, 1)), LOWER(SUBSTRING(c.status, 2))) as status, 
    CONCAT(LOWER(SUBSTRING(u.email, 1))) as email, 
    SUBSTRING_INDEX(u.nome, ' ', 1) as nome, p.prioridade 
    FROM chamados c 
    INNER JOIN prioridade p ON p.id_prioridade = c.id_prioridade
    INNER JOIN usuarios u ON u.id_usuario = c.id_usuario
    WHERE c.status = :stat
    ORDER by c.id_chamado ASC";
    $query = $pdo->prepare($sql);
    $query->bindParam(":stat", $status['0'], PDO::PARAM_STR);
   //$query->bindParam(':stat1', $status['1'], PDO::PARAM_STR);
    $query->execute();
    $chamados = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount() >0) {
        $chamadosabertos = $query->rowCount();
    }
} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}
?>