<?php
if (!isset($_GET['id_chamado']) && !isset($_POST['id_chamado'])) {
    header('location:./tec_chamados_abertos.php');
    exit();
}
try {
    $sql = "SELECT c.data_encerramento FROM chamados c WHERE id_chamado = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $_GET["id_chamado"], PDO::PARAM_INT);
    $query->execute();
    if ($query->rowCount() > 0) {
        $chamadoativo = $query->fetch(PDO::FETCH_ASSOC);
    }
    if ($chamadoativo['data_encerramento'] != NULL) {
        header('location:./tec_chamados_abertos.php');
        exit();
    }
    $sql = "SELECT c.*, 
        CONCAT(UPPER(LEFT(e.empresa, 1)), LOWER(SUBSTRING(e.empresa, 2))) as empresa,
        CONCAT(UPPER(LEFT(ca.categoria, 1)), LOWER(SUBSTRING(ca.categoria, 2))) as categoria, 
        CONCAT(UPPER(LEFT(p.prioridade, 1)), LOWER(SUBSTRING(p.prioridade, 2))) as prioridade 
        FROM chamados c 
        INNER JOIN categorias ca ON ca.id_categoria = c.id_categoria
        INNER JOIN prioridade p ON p.id_prioridade = c.id_prioridade
        INNER JOIN usuarios u ON u.id_usuario = c.id_usuario
        INNER JOIN empresas e ON e.id_empresa = u.id_empresa
        WHERE c.id_chamado = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $_GET["id_chamado"], PDO::PARAM_INT);
    $query->execute();
    $detalhechamado = $query->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Erro ' . $e->getMessage();
}

?>