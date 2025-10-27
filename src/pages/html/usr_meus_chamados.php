<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/usr_meus_chamados.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style_usr.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Meus chamados abertos</title>
</head>

<body class="display-flex">
    <aside class="display-flex">
        <nav id="navbar-esq" class="display-flex-column">
            <a href="./chamados_abertos.php">
                <img src="../../images/logado/Logo.svg" alt="">
            </a>
            <a href="./usr_meus_chamados.php">
                <img src="../../images/logado/Itens novos.svg" alt="">
            </a>
            <!-- <a href="./adm_usuarios.php">
                <img src="../../images/logado/Pessoas.svg" alt="">
            </a>
            <a href="./adm_relatorios.php">
                <img src="../../images/logado/Rede.svg" alt="">
            </a> -->
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
                    <a href="./usr_meus_chamados.php">Meus chamados abertos</a>
                    <p>2</p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./usr_chamados_finalizados.php">Chamados finalizados</a>
                    <p>2</p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./usr_chamados_pendentes.php">Chamados c/ pendencias</a>
                    <p>1</p>
                </div>
            </div>
        </section>
    </aside>
    <main>
        <header class="display-flex">
            <button id="header-button" class="botao">+ NOVO CHAMADO</button>
            <div id="header-user" class="display-flex">
                <img src="../../images/logado/User.svg" alt="">
            </div>
        </header>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Meus chamados Abertos</h2>
                <p class="display-flex">2</p>
            </div>
            <!-- <button class="chamados-button" id="checkall"></button>
            <div class="titulos display-flex">
                <button class="margin-button"></button>
                <p class="margin-email">Email</p>
                <p class="margin-id">ID do chamado</p>
                <p class="margin-status">Status</p>
                <p class="margin-categoria">Categoria</p>
                <p class="margin-prioridade">Prioridade</p>
            </div> -->
            <section id="section-chamados" class="display-flex-column">
                <article class="chamado">
                    <div class="chamados  display-flex">
                        <button class="check chamados-button"></button>
                        <h3 class="button">P</h3>
                        <div class="email">
                            <p>Problemas na internet</p>
                            <div class="email-detalhe"><img src="" alt=""><span>criado a 3 horas por Pedro</span></div>
                        </div>
                        <div id="id">
                            <p>ID #1</p>
                            <span>Respondido 1 hora atrás</span>
                        </div>
                        <h4 class="button">Em atendimento</h4>
                        <p>Reparo de servidor</p>
                        <button class="expand"><img src="../../images/Icons/setaD.svg" alt="" class="seta"></button>
                    </div>
                    <div class="extra">
                        <p>Aqui ficará o acompanhamento de progresso do chamado do cliente</p>
                    </div>
                </article>
                <article class="chamado">
                    <div class="chamados  display-flex">
                        <button class="check chamados-button"></button>
                        <h3 class="button">P</h3>
                        <div class="email">
                            <p>Problemas no servidor</p>
                            <div class="email-detalhe"><img src="" alt=""><span>criado a 3 horas por Pedro</span></div>
                        </div>
                        <div id="id">
                            <p>ID #2</p>
                            <span>Respondido 1 hora atrás</span>
                        </div>
                        <h4 class="button">Em atendimento</h4>
                        <p>Reparo de servidor</p>
                        <button class="expand"><img src="../../images/Icons/setaD.svg" alt="" class="seta"></button>
                    </div>
                    <div class="extra">
                        <p>Aqui ficará o acompanhamento de progresso do chamado do cliente</p>
                    </div>
                </article>
            </section>
        </section>
    </main>
    <script src="../script/button.js"></script>
    <script src="../script/checkButton.js"></script>
    <script src="../script/chamados.js"></script>
</body>

</html>