<?php
require_once('../php/usr_teste.php');
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
    <?php include_once('../php/usr_nav.php') ?>
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
            <form method="POST" action="./usr_chamado_aberto.php">
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
                    <label for="endereco">Endereço:</label>
                    <textarea rows="1" name="endereco" id="endereco"></textarea>
                </div>
                <div class="form-div">
                    <label for="descricaoChamado">Descrição do chamado:</label>
                    <textarea rows="3" name="descricaoChamado" id="descricaoChamado"></textarea>
                </div>
                <div class="form-div">
                    <label for="obs">Observação:</label>
                    <textarea rows="3" name="obs" id="obs"></textarea>
                </div>
                <div id="descricao-button">
                    <button class="button-cian" type="submit" name="submit" id="meuBotao">REALIZAR CHAMADO</button>
                </div>
            </form>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>