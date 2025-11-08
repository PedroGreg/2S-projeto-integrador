<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <main>
        <div id="text-login">
            <img src="../../images/Icons/GMHelp.svg" alt="">
            <div class="text">
                <p>Seja bem vindo!</p>
                <p>a solução Help Desk <span>GMH Support!</span></p>
            </div>
        </div>
        <div id="form-login">
            <form action="../php/validarEmpresa.php" method="post">
                <fieldset>
                    <legend><b>Digite o código da empresa</b></legend>
                    <div class="divInput">
                        <label for="codigo" class="labelUser">Codigo da empresa</label>
                        <input type="number" name="codigo" id="codigo" class="inputUser" required>
                        <p style="color: red; font-size: 12px; margin: top 5px; font-weight: 600;">
                            <?php if (isset($_SESSION["mensagem_erro"])) {
                                echo $_SESSION["mensagem_erro"];
                            } ?></p>
                    </div>
                    <p style="margin-top: 10px;">Já possui cadastro? <a href="./login.php">Entre aqui!</a></p>
                    <input type="submit" name="submit" value="Cadastrar" id="submit">
                </fieldset>
            </form>
        </div>
    </main>
</body>

</html>
<?php
unset($_SESSION["mensagem_erro"]);