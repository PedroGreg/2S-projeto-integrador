<?php
require_once("../php/adm_teste.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adm_dashboard.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>DASHBOARD</title>
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
                <h2>DASHBOARD</h2>
                <!-- <p class="display-flex">3</p> -->
            </div>
            <div class="cards display-flex">
                <div class="card total">
                    <h3>Total de Chamados</h3>
                    <span id="totalChamados">55</span>
                </div>

                <div class="card concluido">
                    <h3>Concluídos</h3>
                    <span id="chamadosConcluidos">33</span>
                </div>

                <div class="card pendente">
                    <h3>Pendentes</h3>
                    <span id="chamadosPendentes">22</span>
                </div>
            </div>

            <div class="grafico-area">
                <h3>Chamados por Categoria</h3>
                <canvas id="graficoCategoria"></canvas>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const categorias = ['Reparo de Servidor', 'Rede', 'Software', 'Impressora', 'Backup'];
        const valores = [25, 10, 8, 7, 5]; // Dados fictícios
        new Chart(document.getElementById('graficoCategoria'), {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Chamados por Categoria',
                    data: valores,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>