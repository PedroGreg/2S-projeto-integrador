<?php
session_start();
if (!isset($_SESSION["admin_logado"]) || $_SESSION["admin_logado"] == false) {
    header("location: ./login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/detalhes_chamado.css">
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
    <aside class="display-flex">
        <nav id="navbar-esq" class="display-flex-column">
            <a href="./chamados_abertos.php">
                <img src="../../images/logado/Logo.svg" alt="">
            </a>
            <a href="./chamados_abertos.php">
                <img src="../../images/logado/Itens novos.svg" alt="">
            </a>
            <a href="./adm_usuarios.php">
                <img src="../../images/logado/Pessoas.svg" alt="">
            </a>
            <a href="">
                <img src="../../images/logado/Rede.svg" alt="">
            </a>
        </nav>
        <section id="navbar-dir" class="display-flex-column">
            <div id="navbar-dir-enterprise" class="display-flex">
                <img src="../../images/logado/Logo.svg" alt="">
                <div>
                    <h1>GMH SUPPORT</h1>
                    <h2>HELP DESK</h2>
                </div>
            </div>
            <div class="navbar-dir-a display-flex">
                <a href="">Pagina Inicial</a>
                <p>0</p>
            </div>
            <div id="navbar-dir-ancoras" class="display-flex-column">
                <div class="navbar-dir-a display-flex">
                    <a href="./chamados_abertos.php">Chamados abertos</a>
                    <p>2</p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./chamados_designados.php">Chamados designados</a>
                    <p>2</p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./chamados_concluidos.php">Chamados concluídos</a>
                    <p>1</p>
                </div>
            </div>
        </section>
    </aside>
    <header class="display-flex">
        <button id="header-button" class="botao">+ NOVO CHAMADO</button>
        <div id="header-user" class="display-flex">
            <img src="../../images/logado/User.svg" alt="">
        </div>
    </header>
    <main>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Detalhes do chamado</h2>
                <p class="display-flex">#01</p>
            </div>
            <dl id="chamados-descricao">
                <div class="chamados-info">
                    <dt>Prioridade:</dt>
                    <dd>ALTA **URGENTE**.</dd>
                </div>
                <div class="chamados-info">
                    <dt>Status:</dt>
                    <dd>Aberto.</dd>
                </div>
                <div class="chamados-info">
                    <dt>Categoria do chamado:</dt>
                    <dd>Acesso Internet</dd>
                </div>
                <div class="chamados-info">
                    <dt>TAC:</dt>
                    <dd>1h20 --- Aberto as 13:00, prazo ideal: até as 14:20.</dd>
                </div>
                <div class="chamados-info">
                    <dt>Descrição do cliente:</dt>
                    <dd>Problema no acesso à internet.</dd>
                </div>
                <div class="chamados-info">
                    <dt>Localização/Área:</dt>
                    <dd>Campus Senac Jurubatuba | Computador A10 NASA.</dd>
                </div>
                <div class="chamados-info">
                    <dt>Endereço:</dt>
                    <dd>Av. Eng. Eusébio Stevaux, 823 - Santo Amaro, São Paulo - SP, 04696-000.</dd>
                </div>
            </dl>
            <div id="descricao-button">
                <button class="botao button-cian">ACEITAR CHAMADO</button>
                <button class="botao button-red">RECUSAR CHAMADO</button>
            </div>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>