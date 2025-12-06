<?php
require_once('../php/usr_teste.php');
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/usr_chamados_finalizados.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style_usr.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Chamados Finalizados</title>
</head>

<body class="display-flex">
    <?php include_once('../php/usr_nav.php') ?>
    <main>
        <header class="display-flex">
            <button id="header-button" class="botao">+ NOVO CHAMADO</button>
            <div id="header-user" class="display-flex">
                <img src="../../images/logado/User.svg" alt="">
            </div>
        </header>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Chamados finalizados</h2>
                <p class="display-flex">
                    <?php if (isset($chamadosfinalizados)) {
                        echo $chamadosfinalizados;
                    } else {
                        echo "0";
                    } ?></p>
            </div>
            <section id="section-chamados" class="display-flex-column">
                <?php foreach ($chamadosfin as $chamado): ?>
                    <article class="chamado">
                        <div class="chamados  display-flex">
                            <h3 class="button"><?php echo $chamado['inicial'] ?></h3>
                            <div class="email">
                                <p>
                                    <?php
                                    switch ($chamado["id_categoria"]) {
                                        case "1":
                                            echo "Outros";
                                            break;
                                        case "2":
                                            echo "Problemas na internet";
                                            break;
                                        case "3":
                                            echo "Problemas de hardware";
                                            break;
                                        case "4":
                                            echo "Problemas de software";
                                            break;
                                    }
                                    ?>
                                </p>
                                <div class="email-detalhe"><img src="" alt=""><span>criado a 4 dias por Pedro</span></div>
                            </div>
                            <div id="id">
                                <p>
                                    <?php echo "ID #" . $chamado['id_chamado'] ?>
                                </p>
                                <span>Finalizado 1 dia atrás</span>
                            </div>
                            <h4 class="button"><?php echo $chamado['status'] ?></h4>
                            <p id="sobre">
                                <?php
                                switch ($chamado['id_categoria']) {
                                    case '1':
                                        echo 'Outros reparos';
                                        break;
                                    case '2':
                                        echo 'Reparo em rede<br>e/ou internet';
                                        break;
                                    case '3':
                                        echo 'Reparo em equipamentos fisicos';
                                        break;
                                    case '4':
                                        echo 'Reparo em aplicativos';
                                        break;
                                }
                                ?>
                            </p>
                            <button class="expand"><img src="../../images/Icons/setaD.svg" alt="" class="seta"></button>
                        </div>
                        <div class="extra">
                            <p>
                                <?php
                                echo "<span style='font-size: 10px'>Mensagem: </span>" . $chamado['mensagem'] . "<br><br>";
                                switch ($chamado['status']) {
                                    case 'aberto':
                                        echo '☑ Chamado aberto... ------ ☐ Chamado em atendimento ------ ☐ Chamado finalizado';
                                        break;
                                    case 'atendimento':
                                        echo '☑ Chamado aberto ------ ☑ Chamado em atendimento... ------ ☐ Chamado finalizado';
                                        break;
                                    case 'finalizado':
                                        echo '☑ Chamado aberto ------ ☑ Chamado em atendimento ------ ☑ Chamado finalizado';
                                        break;
                                }
                                ?>
                            </p>
                            <form class="avaliacao" action="../php/avaliacaoChamado.php?id_chamado=<?php echo $chamado['id_chamado'] ?>" method="post">
                                <div class="radioDiv">
                                    <label class="radioAv" for="nota1">1 Estrela</label>
                                    <input type="radio" name="nota" id="nota1" value="1">
                                </div>
                                <div class="radioDiv">
                                    <label class="radioAv" for="nota2">2 Estrelas</label>
                                    <input type="radio" name="nota" id="nota2" value="2">
                                </div>
                                <div class="radioDiv">
                                    <label class="radioAv" for="nota3">3 Estrelas</label>
                                    <input type="radio" name="nota" id="nota3" value="3">
                                </div>
                                <div class="radioDiv">
                                    <label class="radioAv" for="nota4">4 Estrelas</label>
                                    <input type="radio" name="nota" id="nota4" value="4">
                                </div>
                                <div class="radioDiv">
                                    <label class="radioAv" for="nota5">5 Estrelas</label>
                                    <input type="radio" name="nota" id="nota5" value="5">
                                </div>
                                <button type="submit" name="submit" value="submit" class="submit">Avaliar</button>
                            </form>
                        </div>
                    </article>
                <?php endforeach ?>
            </section>
        </section>
    </main>
    <script src="../script/button.js"></script>
    <script src="../script/checkButton.js"></script>
    <script src="../script/chamados.js"></script>
</body>

</html>