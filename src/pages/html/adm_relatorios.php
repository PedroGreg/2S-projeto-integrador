<?php
require_once("../php/adm_teste.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adm_relatorios.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Relatórios</title>
</head>

<body class="display-flex">
<?php include_once('../php/adm_nav_inf.php') ?>
    <main>
        <header class="display-flex">
            <button id="header-button" class="botao">+ NOVO CHAMADO</button>
            <div id="header-user" class="display-flex">
                <img src="../../images/logado/User.svg" alt="">
            </div>
        </header>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Gerar relatórios</h2>
                <p class="display-flex">2</p>
            </div>
            <article class="relatorios display-flex">
                <form action="" class="display-flex">
                    <div class="display-flex">
                        <h3>Chamados atendidos</h3>
                        <div id="id">
                            <span>Inicio dia:</span>
                            <input type="date" id="data-limite" name="data_inicio" min="2025-01-01" max="" required>
                        </div>
                        <div id="id">
                            <span>Término dia:</span>
                            <input type="date" id="data-limite" name="data_inicio" min="2025-01-01" max="" required>
                        </div>
                    </div>
                    <button id="submit" type="submit">Gerar relatório</button>
                </form>
            </article>
            <article class="relatorios display-flex">
                <form action="" class="display-flex">
                    <div class="email display-flex">
                        <h3>Chamados realizados</h3>
                        <div id="id">
                            <span>Inicio dia:</span>
                            <input type="date" id="data-limite" name="data_inicio" min="2025-01-01" max="" required>
                        </div>
                        <div id="id">
                            <span>Término dia:</span>
                            <input type="date" id="data-limite" name="data_inicio" min="2025-01-01" max="" required>
                        </div>
                    </div>
                    <button id="submit" type="submit">Gerar relatório</button>
                </form>
            </article>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>