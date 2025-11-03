<?php
require_once('../php/tec_teste.php');
require_once('../php/tec_detalhes_chamado.php');
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/tec_conclusao_chamado.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Conclusão do chamado</title>
</head>

<body class="display-flex">
    <?php
    if (isset($_POST['submit'])) {
        if ($_POST['pendencia'] == 'sim') {
            if ($_POST['descricaoPend'] == "") {
                echo "<p style='text-align: center; position: absolute; left: 50%; z-index: 3; margin-top: 20px'>Necesário informar a descrição das pendencias $_POST[descricaoPend]</p>";
            } else {
                $_SESSION['pend'] = 1;
                $_SESSION['descricao'] = $_POST["descricaoPend"];
                header("location: ./tec_chamado_concluido.php?id_chamado=$detalhechamado[id_chamado]");
            }
        } elseif ($_POST['pendencia'] == 'nao') {
            $_SESSION['pend'] = 0;
            header("location: ./tec_chamado_concluido.php?id_chamado=$detalhechamado[id_chamado]");
        }
    }
    include_once('../php/tec_nav.php')
        ?>
    <header class="display-flex">
        <button id="header-button" class="botao">+ NOVO CHAMADO</button>
        <div id="header-user" class="display-flex">
            <img src="../../images/logado/User.svg" alt="">
        </div>
    </header>
    <main>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Conclusão do chamado</h2>
                <p class="display-flex"><?php echo "#".$detalhechamado['id_chamado'] ?></p>
            </div>
            <form method="POST" action="" id="form">
                <div class="form-div">
                    <label for="pendencia">Chamado com pendências?:</label>
                    <select name="pendencia" id="pendencia" required>
                        <option value="nao">Não</option>
                        <option value="sim">Sim</option>
                    </select>
                </div>
                <div class="form-div">
                    <label for="descricaoPend">Descrição das pendências</label>
                    <textarea rows="3" name="descricaoPend" id="descricaoPend"></textarea>
                </div>
                <br>
                <button type="submit" name="submit" value="submit" class="button-cian" id="submit">CONCLUIR
                    CHAMADO</button>
            </form>
        </section>
    </main>
    <script src="../script/button.js"></script>
    <!-- <script>
        const form = document.getElementById('form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
        })
    </script> -->

</body>

</html>