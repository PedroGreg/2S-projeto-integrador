<?php
session_start();
include_once('./tec_teste.php');
include_once('./tec_detalhes_chamado.php');
$id = $_GET["id_chamado"];
if (isset($_POST['submit'])) {
    if ($_POST['pendencia'] == 'sim') {
        if ($_POST['descricaoPend'] == "") {
            header("location: ../html/tec_conclusao_chamado.php?id_chamado=$id");
            exit();
        } else {
            $_SESSION['pend'] = 1;
            $_SESSION['descricao'] = $_POST["descricaoPend"];
            $_SESSION['mensagem'] = $_POST["mensagem"];
            // $_SESSION['id_chamado'] = $detalhechamado['id_chamado'];
            header("location: ../html/tec_chamado_concluido.php?id_chamado=$id");
            exit();
        }

    } elseif ($_POST['pendencia'] == 'nao') {
        if (strlen($_POST['mensagem']) > 3) {
            $_SESSION['pend'] = 0;
            $_SESSION['mensagem'] = $_POST['mensagem'];
            // $_SESSION['id_chamado'] = $detalhechamado['id_chamado'];
            header("location: ../html/tec_chamado_concluido.php?id_chamado=$id");
            exit();
        } else {
            header("location: ../html/tec_conclusao_chamado.php?id_chamado=$id");
            exit();
        }
    }
} else {
    header('location: ../html/tec_chamados_abertos.php');
}
?>