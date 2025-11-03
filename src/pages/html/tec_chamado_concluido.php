<?php
require_once('../php/tec_teste.php');
require_once('../php/tec_detalhes_chamado.php');
if (!isset($_GET['id_chamado'])) {
    header('location:./tec_chamados_abertos.php');
    exit();
}
if ($_SESSION['pend'] == 0) {
    try {
        $sql = "UPDATE chamados c SET status = 'finalizado', c.data_encerramento = NOW() 
    WHERE c.id_chamado = :id AND c.data_encerramento IS NULL";
        $query = $pdo->prepare($sql);
        $query->bindParam(":id", $_GET["id_chamado"], PDO::PARAM_INT);
        $query->execute();
    } catch (PDOException $e) {
        echo 'Erro ' . $e->getMessage();
    }
} else if ($_SESSION['pend'] == 1) {
    try {
        $sql = "UPDATE chamados c SET status = 'pendente', pendencia = :pendencia
        WHERE id_chamado = :id AND c.data_encerramento IS NULL";
        $query = $pdo->prepare($sql);
        $query->bindParam(":pendencia", $_SESSION["descricao"], PDO::PARAM_STR);
        $query->bindParam("id", $_GET['id_chamado'], PDO::PARAM_INT);
        $query->execute();
    } catch (PDOException $e) {

        echo 'erro '. $e->getMessage();}
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/tec_chamado_concluido.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Título</title>
</head>

<body class="display-flex">
    <?php include_once('../php/tec_nav.php') ?>
    <header class="display-flex">
        <button id="header-button" class="botao">+ NOVO CHAMADO</button>
        <div id="header-user" class="display-flex">
            <img src="../../images/logado/User.svg" alt="">
        </div>
    </header>
    <main>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Chamado concluído</h2>
                <p class="display-flex"><?php echo "#".$detalhechamado['id_chamado'] ?></p>
            </div>
            <div id="chamado-concluido" class="display-flex-column">
                <h1>Chamado concluído com sucesso!</h1>
                <a href="./tec_chamados_abertos.php" class="button-cian">CHAMADOS ABERTOS</a>
            </div>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>