<?php
require_once("../php/adm_teste.php");
try {
    require_once("../php/conn.php");
    $sql = "SELECT u.nome, u.email, u.id_usuario, e.empresa FROM usuarios u INNER JOIN empresas e ON u.id_empresa = e.id_empresa";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0){
        $numusuarios = $stmt->rowCount();
    }
}
catch (PDOException $e) {
    echo "Erro " . $e;
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adm_usuarios.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Usuários</title>
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
                <h2>Usuários</h2>
                <p class="display-flex"><?php if(isset($numusuarios)){ echo $numusuarios;} else {echo '0';} ?></p>
            </div>
            <table>
                <thead class="">
                    <tr class="table-header">
                        <td>Nome</td>
                        <td>Email</td>
                        <td>ID do usuário</td>
                        <td>Empresa responsável</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $user): ?>
                        <tr>
                            <td><?php echo $user['nome']?></td>
                            <td><?php echo $user['email']?></td>
                            <td><?php echo $user['id_usuario']?></td>
                            <td><?php echo $user['empresa']?></td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="../script/button.js"></script>
</body>

</html>