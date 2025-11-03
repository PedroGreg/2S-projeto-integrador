<?php
require_once('../php/tec_teste.php');

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/tec_chamados_designados.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Chamados Designados</title>
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
                <h2>Chamados Designados</h2>
                <p class="display-flex">
                    <?php if (isset($chamadosatendimento)) {
                        echo $chamadosatendimento;
                    } else {
                        echo '0';
                    } ?>
                </p>
            </div>
            <!-- <button class="chamados-button" id="checkall"></button>
            <div class="titulos display-flex">
                <button class="margin-button">D</button>
                <p class="margin-email">Email</p>
                <p class="margin-id">ID do chamado</p>
                <p class="margin-status">Status</p>
                <p class="margin-categoria">Categoria</p>
                <p class="margin-prioridade">Prioridade</p>
            </div> -->
            <section id="section-chamados" class="display-flex-column">
                <?php foreach ($chamadosatend as $chamado): ?>
                    <article class="chamados display-flex">
                        <h3 class="button"><?php echo $chamado['inicial']?></h3>
                        <div class="email">
                            <p><?php echo $chamado['email'] ?></p>
                            <div class="email-detalhe"><img src="" alt=""><span>Sendo atendido por
                                    <?php echo $chamado['tecnome'] ?></span></div>
                        </div>
                        <div id="id">
                            <p><?php echo "ID #" . $chamado['id_chamado'] ?></p>
                            <span></span>
                        </div>
                        <h4 class="button">Atendimento</h4>
                        <p>Reparo de servidor</p>
                        <ul>
                            <li>
                                <p><?php echo $chamado['prioridade'] ?></p>
                            </li>
                        </ul>
                        <a href="tec_detalhes_chamado.php?id_chamado=<?php echo $chamado['id_chamado'] ?>&consulta=1"
                            class="button-cian">DETALHES</a>
                    </article>
                <?php endforeach ?>
            </section>
        </section>
    </main>
    <script src="../script/button.js"></script>
    <script src="../script/checkButton.js"></script>
</body>

</html>