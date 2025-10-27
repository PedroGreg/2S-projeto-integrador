<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adm_colaboradores.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Colaboradores</title>
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
            <a href="./adm_relatorios.php">
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
                    <a href="./adm_usuarios.php">Usuários</a>
                    <p></p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./adm_colaboradores.php">Colaboradores</a>
                    <p></p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./cadastrar_administrador.php">Cadastrar administrador</a>
                    <p></p>
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
                <h2>Colaboradores</h2>
                <p class="display-flex">3</p>
            </div>
            <table>
                <thead class="">
                    <tr class="table-header">
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Status</td>
                        <td>ID do chamado</td>
                        <td>ID do colaborador</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <td>João</td>
                        <td>joao@gmail.com</td>
                        <td>Disponivel</td>
                        <td>NA</td>
                        <td>01</td>
                    </tr>
                    <tr class="table-row">
                        <td>Cleber</td>
                        <td>cleber@gmail.com</td>
                        <td>Em atendimento</td>
                        <td>02</td>
                        <td>02</td>
                    </tr>
                    <tr class="table-row">
                        <td>Maria</td>
                        <td>maria@gmail.com</td>
                        <td>Folga</td>
                        <td>NA</td>
                        <td>03</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>