<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div id="divForm">
        <form action="./testeLogin.php" method="POST">
            <fieldset>
                <legend>login</legend>
                <div class="inputDiv">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="inputLabel">NOME</label>
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