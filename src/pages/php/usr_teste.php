<?php
session_start();
if (!isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] == false) {
    header("location: ./login.php");
    exit();
}
try {
    $status = ['aberto', 'atendimento', 'pendente', 'finalizado'];

    $id = $_SESSION["id"];
    require_once("../php/conn.php");
    $sql = "SELECT c.*, 
    UPPER(LEFT(u.nome, 1)) AS inicial, 
    CONCAT(UPPER(LEFT(u.nome, 1)), LOWER(SUBSTRING(SUBSTRING_INDEX(u.nome, ' ', 1),2))) AS nome 
    FROM chamados c 
    INNER JOIN usuarios u ON u.id_usuario = c.id_usuario 
    WHERE c.id_usuario = :id AND (c.status = :stat OR c.status = :stat1)";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->bindParam(":stat", $status['0'], PDO::PARAM_STR);
    $query->bindParam(":stat1", $status['1'], PDO::PARAM_STR);
    $query->execute();
    $success = $query->execute();

    $chamados = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
        $meuschamados = $query->rowCount();
    }

    $sql = "SELECT c.*,
    UPPER(LEFT(u.nome, 1)) AS inicial,
    CONCAT(UPPER(LEFT(u.nome, 1)), LOWER(SUBSTRING(SUBSTRING_INDEX(u.nome, ' ', 1), 2))) AS nome
    FROM chamados c
    INNER JOIN usuarios u ON u.id_usuario = c.id_usuario
    WHERE c.id_usuario = :id AND c.status = :stat";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->bindParam(":stat", $status['3'], PDO::PARAM_STR);
    $query->execute();
    $chamadosfin = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
        $chamadosfinalizados = $query->rowCount();
    }

    $sql = "SELECT c.*, 
    COUNT(m.mensagem_usuario) as mu, 
    COUNT(m.mensagem_tecnico) as mt,
    UPPER(LEFT(u.nome, 1)) AS inicial,
    CONCAT(UPPER(LEFT(u.nome, 1)), LOWER(SUBSTRING(SUBSTRING_INDEX(u.nome, ' ', 1), 2))) AS nome
    FROM chamados c
    LEFT JOIN mensagens m ON m.id_chamado = c.id_chamado 
    INNER JOIN usuarios u ON u.id_usuario = c.id_usuario
    WHERE c.id_usuario = :id AND c.status = :stat
    GROUP by c.id_chamado";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->bindParam(":stat", $status["2"], PDO::PARAM_STR);
    $query->execute();
    $chamadospen = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
        $chamadospendentes = $query->rowCount();
    }

} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}

?>