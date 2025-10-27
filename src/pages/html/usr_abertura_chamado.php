<?php
session_start();
if (!isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] == false) {
    header("location: ./login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/usr_abertura_chamado.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style_usr.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Conclusão do chamado</title>
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
            <!-- <a href="./adm_usuarios.html">
                <img src="../../images/logado/Pessoas.svg" alt="">
            </a>
            <a href="">
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
    <header class="display-flex">
        <button id="header-button" class="botao">+ NOVO CHAMADO</button>
        <div id="header-user" class="display-flex">
            <img src="../../images/logado/User.svg" alt="">
        </div>
    </header>
    <main>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Abertura de chamado</h2>
                <!-- <p class="display-flex">#01</p> -->
            </div>
            <form method="" action="./chamado_aberto.php">
                <div class="form-div">
                    <label for="categoria">Categoria do chamado:</label>
                    <select name="categoria" id="categoria">
                        <option value="outros">Outros</option>
                        <option value="rede">Acesso internet</option>
                        <option value="hardware">Problemas com hardware</option>
                        <option value="software">Problemas com aplicativos</option>
                    </select>
                </div>
                <div class="form-div">
                    <label for="obs">Endereço:</label>
                    <textarea rows="1" name="obs" id="obs"></textarea>
                </div>
                <div class="form-div">
                    <label for="descricaoPend">Descrição do chamado:</label>
                    <textarea rows="3" name="descricaoPend" id="descricaoPend"></textarea>
                </div>
                <div class="form-div">
                    <label for="obs">Observação:</label>
                    <textarea rows="3" name="obs" id="obs"></textarea>
                </div>
            </form>
            <div id="descricao-button">
                <button class="botao button-cian" id="meuBotao">REALIZAR CHAMADO</button>
            </div>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>