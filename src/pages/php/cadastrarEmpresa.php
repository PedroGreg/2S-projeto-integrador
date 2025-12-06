<?php
session_start();
if (!isset($_POST["submit"]) || !isset($_POST["nome"]) || !isset($_POST["email"])) {
    $_SESSION["mensagem_erro"] = "DADOS INCORRETOS";
    header("location: ../html/cadastro.php");
    exit();
}
unset($_SESSION["mensagem_erro"]);
$regex_nome = "/^[A-Za-zÀ-ü]+(\s[A-za-zÀ-ü]+)+$/";
$_SESSION['nomecad'] = $_POST["nome"];
$_SESSION['emailcad'] = $_POST["email"];
if (
    strlen($_POST["nome"]) > 3 &&
    strlen($_POST["nome"]) <= 255 &&
    strlen($_POST["email"]) > 0 &&
    strlen($_POST["email"]) <= 255 &&
    filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) &&
    preg_match($regex_nome, $_POST['nome'])
) {
    require_once "./conn.php";
    try {
        $nome = $_POST['nome'];
        $email = strtolower(trim($_POST['email']));
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        do {
            try{
                $codigo = random_int(100000, 999999);
                $sql = "SELECT codigo FROM empresas WHERE codigo = :codigo;";
                $query = $pdo->prepare($sql);
                $query->bindParam(":codigo", $codigo, PDO::PARAM_INT);
                $query->execute();
                if ($query->rowCount() > 0) {
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    $codigorepetido = $result["codigo"];
                }
            }
            catch(Exception $e){
            }
        } while ($codigo == $codigorepetido);
        
        $_SESSION['codigo'] = $codigo;
        $sql = "INSERT INTO empresas (empresa,cnpj,telefone,endereco,email,codigo) VALUES (:empresa,:cnpj,:telefone,:endereco,:email,:codigo);";
        $query = $pdo->prepare($sql);
        $query->bindParam(':empresa', $nome, PDO::PARAM_INT);
        $query->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $query->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $query->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_INT);
        $query->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $query->execute();
        header('location:../html/cadastro_administrador.php');
        exit();
    } catch (PDOException $e) {
        echo 'Erro ao gravar os dados no banco de dados' . $e->getMessage();
    }
} elseif (strlen($_POST["nome"]) <= 3 || strlen($_POST["nome"]) > 255) {
    $_SESSION['mensagem_erro'] = "O nome deve ter entre 4 e 255 letras";
    header("location:../html/cadastro_empresa.php");
    exit();
} elseif (!preg_match($regex_nome, $_POST['nome'])) {
    $_SESSION['mensagem_erro'] = "O nome deve ter pelo menos dois nomes!";
    header("location:../html/cadastro_empresa.php");
    exit();
} elseif (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    $_SESSION['mensagem_erro'] = "Insira um email válido!";
    header("location:../html/cadastro_empresa.php");
    exit();

} elseif (strlen($_POST["senha"]) <= 7 || strlen($_POST["senha"]) > 35) {
    $_SESSION['mensagem_erro'] = "A senha deve ter entre 8 e 35 digitos/caracteres!";
    header("location:../html/cadastro_empresa.php");
    exit();
} else {
    $_SESSION['mensagem_erro'] = "Verifique as informações";
    header("location:../html/cadastro_empresa.php");
    exit();
}
?>