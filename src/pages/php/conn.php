<?php
$dbHost = "mysql-gmh-gmh-support.i.aivencloud.com";
$dbName = "gmh";
$dbUsername = "avnadmin";
$dbPassword = 'AVNS_wCb-fqcic6XWw8_L91_';
$dbPort = '12997';
$charset = 'utf8mb4';

$dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName;$charset";
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