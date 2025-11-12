<?php
require_once('../php/tec_teste.php');

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/tec_chamados_concluidos.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Chamados Concluídos</title>
</head>

<body class="display-flex">
    <?php include_once('../php/tec_nav.php') ?>
    <main>
        <header class="display-flex">
            <button id="header-button" class="botao">+ NOVO CHAMADO</button>
            <div id="header-user" class="display-flex">
                <img src="../../images/logado/User.svg" alt="">
            </div>
        </header>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Chamados Concluidos</h2>
                <p class="display-flex"><?php echo $chamadosfinalizados ?></p>
            </div>
            <section id="section-chamados" class="display-flex-column">
                <?php foreach ($chamadosfin as $chamado): ?>
                    <article class="chamados display-flex">
                        <h3 class="button"><?php echo $chamado['inicial'] ?></h3>
                        <div class="email">
                            <p><?php echo $chamado['email'] ?></p>
                            <div class="email-detalhe"><img src="" alt=""><span>Atendido por
                                    <?php if ($chamado['tecnome'] != 'Sem Técnico') {
                                        echo $chamado['tecnome'];
                                    } elseif ($chamado['admnome'] != 'Sem Administrador') {
                                        echo $chamado['admnome'];
                                    } ?></span></div>
                        </div>
                        <div id="id">
                            <p><?php echo "ID #" . $chamado['id_chamado'] ?></p>
                            <span></span>
                        </div>
                        <div id="id">
                            <span>Aberto dia</span>
                            <p><?php echo $chamado['dataA'] ?></p>
                        </div>
                        <div id="id">
                            <span>Concluído dia</span>
                            <p><?php echo $chamado['dataE'] ?></p>
                        </div>
                        <div id="id">
                            <span>Tempo total</span>
                            <p><?php echo $chamado['tempo'] . 'h' ?></p>
                        </div>
                        <div id="avaliacao" class="display-flex-column">
                            <h4 id="av">5.0</h4>
                            <img src="../../images/logado/5-estrelas.svg" alt="">
                        </div>
                    </article>
                <?php endforeach ?>
            </section>
        </section>
    </main>
    <script src="../script/button.js"></script>
    <script src="../script/checkButton.js"></script>
</body>

</html>