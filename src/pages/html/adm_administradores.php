<?php
require_once("../php/adm_teste.php");
try {
    require_once("../php/conn.php");
    $sql = "SELECT a.nome, a.email, a.id_administrador, a.ativo, e.empresa FROM administradores a INNER JOIN empresas e ON a.id_empresa = e.id_empresa";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $administradores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0){
        $numadministradores = $stmt->rowCount();
    }
} catch (PDOException $e) {
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

    <title>Administradores</title>
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
                <h2>Administradores</h2>
                <p class="display-flex">
                    <?php if (isset($numadministradores)) {
                    echo $numadministradores;
                    } else {
                    echo '0';
                    } 
                    ?>
                </p>
            </div>
            <table>
                <thead class="">
                    <tr class="table-header">
                        <td class="tdhead">Nome</td>
                        <td class="tdhead">Email</td>
                        <td class="tdhead">ID do administrador</td>
                        <td class="tdhead">Empresa responsável</td>
                        <td class="tdhead">Ativo</td>
                        <td class="tdhead">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($administradores as $admin): ?>
                        <tr class="<?php if($x == 1){ echo "gray"; $x = 0; }else{ echo "white"; $x = 1; } ?>">
                            <td class="tdbody"><?php echo $admin['nome'] ?></td>
                            <td class="tdbody"><?php echo $admin['email'] ?></td>
                            <td class="tdbody"><?php echo $admin['id_administrador'] ?></td>
                            <td class="tdbody"><?php echo $admin['empresa'] ?></td>
                            <td class="tdbody"><?php if ($admin['ativo']) {
                                echo "ATIVO";
                            } else {
                                echo "INATIVO";
                            } ?></td>
                            <td><a href="./adm_editar_administradores.php?id_administrador=<?php echo $admin['id_administrador']; ?>" class="action-btn editar">Editar</a>
                            <a href="../php/adm_excluir_administradores.php?id_administrador=<?php echo $admin['id_administrador']; ?>" class="action-btn delete-btn deletar" onclick="return confirmDeletion();">Excluir</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
    </main>
    <script>
        function confirmDeletion(){
            return confirm('Tem certeza que deseja deletar esse colaborador?');
        }
    </script>
</body>

</html>