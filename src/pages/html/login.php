<?php
session_start();
if (isset($_SESSION["mensagem_erro"]))
    print_r($_SESSION["mensagem_erro"]);
unset($_SESSION['IDE']);

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
            <form action="../php/validarLogin.php" method="post">
                <fieldset>
                    <legend><b>LOGIN</b></legend>
                    <div class="divInput">
                        <label for="email" class="labelUser">Email</label>
                        <input type="email" value="<?php if (isset($_SESSION['email']))
                            echo $_SESSION['email'] ?>" name="email" id="email" class="inputUser" required>
                    </div>
                    <div class="divInput">
                            <label for="senha" class="labelUser">Senha</label>
                            <input type="password" name="senha" id="senha" class="inputUser" required>
                    </div>
                    <a href="./recuperacao.php">Esqueci minha senha!</a><br>
                    <p style="margin-top: 10px;">Ainda não cadastrado? <a href="./cadastro.php">Cadastre-se Aqui!</a>
                    </p>
                    <input type="submit" name="submit" value="Login" id="submit">
                </fieldset>
            </form>
        </div>
    </main>
</body>

    </html>
    <?php
    unset($_SESSION['mensagem_erro']);
