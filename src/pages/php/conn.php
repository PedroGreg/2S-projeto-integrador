<?php
$dbHost = "localhost";
$dbName = "gmh";
$dbUsername = "root";
$dbPassword = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$dbHost;dbname=$dbName;$charset";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
);

try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword, $options);
    //echo "Conexão bem sucedida";
} catch (PDOException $e) {
    //echo "Deu erro: " . $e->getMessage();
}
?>