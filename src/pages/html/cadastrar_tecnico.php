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
    <link rel="stylesheet" href="../style/cadastrar_administrador.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Título</title>
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
                    <a href="./adm_administradores.php">Administradores</a>
                    <p></p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./cadastrar_tecnico.php">Cadastrar Tecnico</a>
                    <p></p>
                </div>
                <div class="navbar-dir-a display-flex">
                    <a href="./cadastrar_administrador.php">Cadastrar administrador</a>
                    <p></p>
                </div>
            </div>
        </section>
    </aside>
    <header class="display-flex">
        <div id="header-user" class="display-flex">
            <img src="../../images/logado/User.svg" alt="">
        </div>
    </header>
    <main>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Cadastrar Tecnico</h2>
            </div>
            <div>
                <form action="../php/cadastrarTecnico.php" method="post">
                    <fieldset>
                        <div class="divInput">
                            <label for="codigo">ID da empresa</label>
                            <input type="number" name="codigo" id="codigo" class="input" required>
                        </div>
                        <div class="divInput">
                            <label for="nome">Nome Completo</label>
                            <input type="text" name="nome" id="nome" class="input" required>
                        </div>
                        <div class="divInput">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="input" required>
                        </div>
                        <div class="divInput">
                            <label for="senha">Senha</label>
                            <input type="text" name="senha" id="senha" class="input" required>
                        </div>
                        <div class="divInput">
                            <label for="ativo">Ativo</label>
                            <input type="checkbox" name="ativo" id="ativo" class="input" value="1" checked>
                        </div>
                        <button type="submit" name="submit" id="submit">CADASTRAR</button>
                        <?php if (isset($_SESSION["mensagem_erro"])) echo "<h3>" .$_SESSION['mensagem_erro'] . "</h3>" ?>
                        <?php if (isset($_SESSION["mensagem_sucesso"])) echo "<h3>" .$_SESSION['mensagem_sucesso'] . "</h3>" ?>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <script src="../script/chamados_abertos.js"></script>
</body>

</html>
<?php 
unset($_SESSION["mensagem_erro"]);
unset($_SESSION["mensagem_sucesso"]);
?>