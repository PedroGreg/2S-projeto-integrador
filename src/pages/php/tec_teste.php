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
$status = ['aberto', 'atendimento', 'pendente', 'finalizado'];
try {
    $sql = "SELECT c.id_chamado, c.id_categoria, 
    UPPER(LEFT(u.nome, 1)) as inicial,
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
    if ($query->rowCount() > 0) {
        $chamadosabertos = $query->rowCount();
    }

    $sql = "SELECT c.id_chamado, c.id_categoria, 
    UPPER(LEFT(u.nome, 1)) as inicial,
    COALESCE(CONCAT(UPPER(LEFT(t.nome, 1)), LOWER(SUBSTRING(SUBSTRING_INDEX(t.nome, ' ', 1), 2))), 'Sem Técnico') as tecnome,
    CONCAT(UPPER(LEFT(c.status, 1)), LOWER(SUBSTRING(c.status, 2))) as status, 
    CONCAT(LOWER(SUBSTRING(u.email, 1))) as email, 
    SUBSTRING_INDEX(u.nome, ' ', 1) as nome, p.prioridade 
    FROM chamados c 
    LEFT JOIN tecnicos t ON t.id_tecnico = c.id_tecnico
    INNER JOIN prioridade p ON p.id_prioridade = c.id_prioridade
    INNER JOIN usuarios u ON u.id_usuario = c.id_usuario
    WHERE c.status = :stat
    ORDER by c.id_chamado ASC";
    $query = $pdo->prepare($sql);
    $query->bindParam(":stat", $status['1'], PDO::PARAM_STR);
    //$query->bindParam(':stat1', $status['1'], PDO::PARAM_STR);
    $query->execute();
    $chamadosatend = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
        $chamadosatendimento = $query->rowCount();
    }

    $sql = "SELECT c.id_chamado, c.id_categoria,
    DATE_FORMAT(c.data_abertura, '%d/%m/%Y ás %H:%i') AS dataA,
    DATE_FORMAT(c.data_encerramento, '%d/%m/%Y ás %H:%i') AS dataE,
    TIMESTAMPDIFF(HOUR, c.data_abertura, c.data_encerramento) AS tempo,
    UPPER(LEFT(u.nome, 1)) AS inicial,
    COALESCE(CONCAT(UPPER(LEFT(t.nome, 1)),LOWER(SUBSTRING(SUBSTRING_INDEX(t.nome, ' ', 1),2))),'Sem Técnico') AS tecnome,
    CONCAT(UPPER(LEFT(c.status, 1)),LOWER(SUBSTRING(c.status, 2))) AS status,
    CONCAT(LOWER(SUBSTRING(u.email, 1))) AS email,
    SUBSTRING_INDEX(u.nome, ' ', 1) AS nome,
    p.prioridade
FROM chamados c
LEFT JOIN tecnicos t ON t.id_tecnico = c.id_tecnico
INNER JOIN prioridade p ON p.id_prioridade = c.id_prioridade
INNER JOIN usuarios u ON u.id_usuario = c.id_usuario
WHERE c.status = :stat
ORDER BY c.id_chamado ASC";
    $query = $pdo->prepare($sql);
    $query->bindParam(":stat", $status['3'], PDO::PARAM_STR);
    //$query->bindParam(':stat1', $status['1'], PDO::PARAM_STR);
    $query->execute();
    $chamadosfin = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
        $chamadosfinalizados = $query->rowCount();
    }

} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}
?>