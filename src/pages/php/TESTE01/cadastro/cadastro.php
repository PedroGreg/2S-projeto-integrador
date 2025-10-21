<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST")
if (isset($_POST['submit'])){
    include_once('../conexao.php');
    // print_r($_REQUEST);
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $result = mysqli_query($conexao, "INSERT INTO usuarios(email,senha) VALUES ('$email','$senha')");

    header('Location: ../login/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>

<body>
    <div id="divForm">
        <form action="./cadastro.php" method="POST">
            <fieldset>
                <legend>Cadastro</legend>
                <div class="inputDiv">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="inputLabel">EMAIL</label>
                </div><br>
                <div class="inputDiv">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="inputLabel">SENHA</label>
                </div><br>
                <input type="submit" value="submit" id="submit" name="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>