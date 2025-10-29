<?php
require_once('../php/usr_teste.php');
if (!isset($_POST["submit"]) || !isset($_POST["descricaoChamado"]) || !isset($_POST['categoria'])) {
    header("location: ./usr_abertura_chamado.php");
    exit();
}
$id = $_SESSION["id"];
$categoria = $_POST["categoria"];
$endereco = $_POST["endereco"];
$descricao = $_POST["descricaoChamado"];
$observacao = $_POST["obs"];
try {
    require_once('../php/conn.php');

    $sql = "SELECT c.id_categoria FROM categorias c WHERE categoria = :categoria";
    $query = $pdo->prepare($sql);
    $query->bindParam(":categoria", $categoria, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $idc = $result["id_categoria"];
    $sql = "SELECT p.id_prioridade FROM prioridade p WHERE p.id_categoria = $idc";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $idp = $result["id_prioridade"];
    $sql = "INSERT INTO chamados (id_usuario,id_prioridade,id_categoria,endereco,descricao,observacao) 
            VALUES (:id,:idp,:idc,:ender,:descr,:obser)";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->bindParam(":idp", $idp, PDO::PARAM_INT);
    $query->bindParam(":idc", $idc, PDO::PARAM_INT);
    $query->bindParam(":ender", $endereco, PDO::PARAM_STR);
    $query->bindParam(":descr", $descricao, PDO::PARAM_STR);
    $query->bindParam(":obser", $observacao, PDO::PARAM_STR);
    $query->execute();
        $meuschamados = $query->rowCount();
} catch (PDOException $e) {
    print_r("Erro " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/chamado_aberto.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style_usr.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Título</title>
</head>

<body class="display-flex">
    <?php include_once('../php/usr_nav.php') ?>
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
                <p class="display-flex">0</p>
            </div>
            <div id="chamado-aberto" class="display-flex-column">
                <h1>Chamado aberto com sucesso!</h1>
                <div>
                    <p>O chamado foi aberto!<br>
                        Um técnico irá lhe atender o mais breve possível</p>
                </div>
                <button class="botao button-cian">MEUS CHAMADOS ABERTOS</button>
            </div>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>