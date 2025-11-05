<?php
require_once("../php/adm_teste.php");
try {
    require_once("../php/conn.php");
    $sql = "SELECT * FROM tecnicos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $tecnicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0){
        $numtecnicos = $stmt->rowCount();
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
    <link rel="stylesheet" href="../style/adm_colaboradores.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Colaboradores</title>
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
                <h2>Colaboradores</h2>
                <p class="display-flex">
                    <?php if (isset($numtecnicos)) {
                    echo $numtecnicos;
                    } else {
                    echo '0';
                    } 
                    ?>
                </p>
            </div>
            <table>
                <thead class="">
                    <tr class="table-header">
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Status</td>
                        <td>ID do chamado</td>
                        <td>ID do colaborador</td>
                        <td>Ativo</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tecnicos as $tec): ?>
                        <tr>
                            <td><?php echo $tec['nome'] ?></td>
                            <td><?php echo $tec['email']?></td>
                            <td><?php echo $tec['status']?></td>
                            <td><?php echo $tec['id_chamado']?></td>
                            <td><?php echo $tec['id_tecnico']?></td>
                            <td><?php if ($tec['ativo'] === 1){ echo "SIM"; }else{ echo "NÃO";} ?></td>
                            <td><a href="./adm_editar_colaboradores.php?id_tecnico=<?php echo $tec['id_tecnico']; ?>" class="action-btn">Editar</a>
                            <a href="../php/adm_excluir_colaboradores.php?id_tecnico=<?php echo $tec['id_tecnico']; ?>" class="action-btn delete-btn" onclick="return confirmDeletion();">Excluir</a></td>
                        </tr>
                    <?php endforeach; ?>
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