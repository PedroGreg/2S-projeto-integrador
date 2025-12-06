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
    <?php include_once('../php/tec_nav.php') ?>
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
                <p class="display-flex"><?php echo "#" . $detalhechamado['id_chamado'] ?></p>
            </div>
            <form method="POST" action="../php/tec_validar_chamado.php?id_chamado=<?php echo $detalhechamado['id_chamado'] ?>" id="form">
                <div class="form-div">
                    <label for="pendencia">Chamado com pendências?:</label>
                    <select name="pendencia" id="pendencia" required>
                        <option value="nao">Não</option>
                        <option value="sim">Sim</option>
                    </select>
                </div>
                <div id="pendenciaDiv" class="form-div">
                    <label for="descricaoPend">Descrição das pendências</label>
                    <textarea rows="3" name="descricaoPend" id="descricaoPend"></textarea>
                </div>
                <div class="form-div">
                    <label for="mensagem">Descrição do serviço</label>
                    <textarea rows="3" name="mensagem" id="mensagem"></textarea>
                </div>
                <br>
                <button type="submit" name="submit" value="submit" class="button-cian" id="submit">CONCLUIR
                    CHAMADO</button>
            </form>
        </section>
    </main>
    <script src="../script/button.js"></script>
   <script>
    const pendenciaDiv = document.getElementById('pendenciaDiv');
        const pendencia = document.getElementById('pendencia');
        pendencia.addEventListener('change', () => {
            if(pendencia.value == "sim"){
                pendenciaDiv.classList.add('ativo');
            }else{
                pendenciaDiv.classList.remove('ativo');
            }
        })
        
    </script>

</body>

</html>