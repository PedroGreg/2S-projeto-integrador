<?php
    $dbHost = "Localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "gmhteste";
    $conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    if ($conn->connect_errno){
        echo "Deu erro: " . $conn->connect_error;
    } else{
        echo "Tudo certo meu rei";
    }
?>