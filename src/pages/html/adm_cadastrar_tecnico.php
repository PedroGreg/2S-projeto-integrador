<?php
require_once("../php/adm_teste.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adm_cadastrar_administrador.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Cadastrar Técnico</title>
</head>

<body class="display-flex">
<?php include_once('../php/adm_nav.php') ?>
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
                            <label class="label" for="codigo">ID da empresa</label>
                            <input class="input" type="number" name="codigo" id="codigo" class="input" required>
                        </div>
                        <div class="divInput">
                            <label class="label" for="nome">Nome Completo</label>
                            <input class="input" type="text" name="nome" id="nome" class="input" required>
                        </div>
                        <div class="divInput">
                            <label class="label" for="email">Email</label>
                            <input class="input" type="email" name="email" id="email" class="input" required>
                        </div>
                        <div class="divInput">
                            <label class="label" for="senha">Senha</label>
                            <input class="input" type="text" name="senha" id="senha" class="input" required>
                        </div>
                        <div class="divInput">
                            <label class="labelcheck" for="ativo">Ativo</label>
                            <input class="input" type="checkbox" name="ativo" id="ativo" class="input" value="1" checked>
                        </div>
                        <button class="button-cian" type="submit" name="submit" id="submit">CADASTRAR</button>
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