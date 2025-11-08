<?php
session_start();

require_once("../php/conn.php");

if (!isset($_SESSION['admin_logado'])) {
    header("Location:login.php");
    exit();
}
$regex_nome = "/^[A-Za-zÀ-ü]+(\s[A-za-zÀ-ü]+)+$/";
$admin_id = $_GET['id_administrador'];
$stmt_admin = $pdo->prepare('SELECT * FROM administradores WHERE id_administrador = :id_administrador');
$stmt_admin->bindParam(':id_administrador', $admin_id, PDO::PARAM_INT);
$stmt_admin->execute();
$admin = $stmt_admin->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if ($_POST['telefone'] === '') {
        $telefone = 000000000;
    } else {
        $telefone = $_POST['telefone'];
    }
    if (isset($_POST['ativo'])) {
        $ativo = $_POST['ativo'];
    } else {
        $ativo = 0;
    }
    if (
        strlen($_POST["nome"]) > 3 &&
        strlen($_POST["nome"]) <= 255 &&
        strlen($_POST["email"]) > 0 &&
        strlen($_POST["email"]) <= 255 &&
        filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) &&
        preg_match($regex_nome, $_POST['nome']) &&
        strlen($_POST["senha"]) > 7 &&
        strlen($_POST["senha"]) <= 35
    ) {
        try {
            $stmt_update_administrador = $pdo->prepare("UPDATE administradores SET nome = :nome, email = :email, senha = :senha, ativo = :ativo WHERE id_administrador = :id");
            $stmt_update_administrador->bindParam(':nome', $nome);
            $stmt_update_administrador->bindParam(':id', $admin_id);
            $stmt_update_administrador->bindParam(':email', $email);
            $stmt_update_administrador->bindParam(':senha', $senha);
            $stmt_update_administrador->bindParam(':ativo', $ativo);
            // $stmt_update_administrador->bindParam(':telefone', $telefone);
            $stmt_update_administrador->execute();
            header('location:./adm_administradores.php');
            exit();
        } catch (PDOException $e) {

        }
    } elseif (strlen($_POST["nome"]) <= 3 || strlen($_POST["nome"]) > 255) {
        $_SESSION['mensagem_erro'] = "O nome deve ter entre 4 e 255 letras";
        header("location:./adm_editar_administradores.php?id_administrador=" . $admin_id);
        exit();
    } elseif (!preg_match($regex_nome, $_POST['nome'])) {
        $_SESSION['mensagem_erro'] = "O nome deve ter pelo menos um nome e sobrenome e não deve conter números!";
        header("location:./adm_editar_administradores.php?id_administrador=" . $admin_id);
        exit();
    } elseif (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensagem_erro'] = "Insira um email válido!";
        header("location:./adm_editar_administradores.php?id_administrador=" . $admin_id);
        exit();

    } elseif (strlen($_POST["senha"]) <= 7 || strlen($_POST["senha"]) > 35) {
        $_SESSION['mensagem_erro'] = "A senha deve ter entre 8 e 35 digitos/caracteres!";
        header("location:./adm_editar_administradores.php?id_administrador=" . $admin_id);
        exit();
    } else {
        $_SESSION['mensagem_erro'] = "Verifique as informações";
        header("location:./adm_editar_administradores.php?id_administrador=" . $admin_id);
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adm_cadastrar_administrador.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Editar administrador</title>
</head>

<body class="display-flex">
    <?php include_once('../php/adm_nav.php') ?>
    <main>
        <header class="display-flex">
            <button id="header-button" class="botao">+ NOVO CHAMADO</button>
            <div id="header-user" class="display-flex">
                <img src="../../images/logado/User.svg" alt="">
            </div>
        </header>
        <section id="hero" class="display-flex-column">
            <div class="hero-titulo display-flex">
                <h2>Editar Administrador</h2>
                <p class="display-flex"><?php echo '#' . $admin_id ?></p>
            </div>
            <div>
                <form action="" method="post">
                    <fieldset>
                        <div class="divInput">
                            <label class="label" for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" value="<?= $admin['nome'] ?>" class="input"
                                required>
                        </div>
                        <div class="divInput">
                            <label class="label" for="email">Email</label>
                            <input type="text" name="email" id="email" value="<?= $admin['email'] ?>" class="input"
                                required>
                        </div>
                        <div class="divInput">
                            <label class="label" for="senha">Senha</label>
                            <input type="text" name="senha" id="senha" value="<?= $admin['senha'] ?>" class="input"
                                required>
                        </div>
                        <!-- <div class="divInput">
                            <label class="label"for="telefone">Telefone</label>
                            <input type="number" name="telefone" id="telefone" value="<?= $admin['telefone'] ?>" class="input">
                        </div> -->
                        <div class="divInput">
                            <label class="labelcheck" for="ativo">Ativo</label>
                            <input type="checkbox" name="ativo" id="ativo" class="input" value="1" checked>
                        </div>
                        <p style="color: red; font-size: 12px; margin: top 5px; font-weight: 600;">
                            <?php if (isset($_SESSION['mensagem_erro']))
                                    echo $_SESSION['mensagem_erro'] ?>
                            </p>
                        <button class="button-cian" type="submit" name="submit" id="submit">CADASTRAR</button>
                    </fieldset>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($e)) {
                            echo "Error";
                        } else {
                            echo "OK";
                        }
                    }
                    ?>
                </form>
            </div>
        </section>
    </main>
    <script>
        function confirmDeletion() {
            return confirm('Tem certeza que deseja deletar esse colaborador?');
        }
    </script>
</body>

</html>
<?php
unset($_SESSION['mensagem_erro']);