<?php
require_once('../php/tec_teste.php');
require_once('../php/tec_detalhes_chamado.php');
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/tec_detalhes_chamado.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Chamado</title>
</head>

<body class="display-flex">
    <?php include_once('../php/tec_nav.php') ?>
    <header class="display-flex">
        <button id="header-button" class="botao">+ NOVO CHAMADO</button>
            <?php ?>
        <div id="header-user" class="display-flex">
            <img src="../../images/logado/User.svg" alt="">
        </div>
    </header>
    <main>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Detalhes do chamado</h2>
                <p class="display-flex"><?php echo "#" . $detalhechamado['id_chamado'] ?></p>
            </div>
            <dl id="chamados-descricao">
                <div class="chamados-info">
                    <dt>Prioridade:</dt>
                    <dd><?php echo $detalhechamado['prioridade']  ?></dd>
                </div>
                <div class="chamados-info">
                    <dt>Status:</dt>
                    <dd>Aberto.</dd>
                </div>
                <div class="chamados-info">
                    <dt>Categoria do chamado:</dt>
                    <dd><?php echo $detalhechamado['categoria'] ?></dd>
                </div>
                <div class="chamados-info">
                    <dt>TAC:</dt>
                    <dd>1h20 --- Aberto as 13:00, prazo ideal: até as 14:20.</dd>
                </div>
                <div class="chamados-info">
                    <dt>Descrição do cliente:</dt>
                    <dd><?php echo $detalhechamado['descricao']?></dd>
                </div>
                <div class="chamados-info">
                    <dt>Empresa:</dt>
                    <dd><?php echo $detalhechamado['empresa'] ?></dd>
                </div>
                <div class="chamados-info">
                    <dt>Endereço:</dt>
                    <dd><?php echo $detalhechamado['endereco'] ?></dd>
                </div>
            </dl>
            <div id="descricao-button">
                <a href="./tec_finalizar_chamado.php?id_chamado=<?php echo $detalhechamado['id_chamado']?>" class="button-cian">ACEITAR CHAMADO</a>
                <a href="./tec_chamados_abertos.php" class="button-red">RECUSAR CHAMADO</a>
            </div>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>