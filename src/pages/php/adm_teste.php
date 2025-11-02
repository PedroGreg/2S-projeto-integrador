<?php
session_start();
if (!isset($_SESSION["admin_logado"]) || $_SESSION["admin_logado"] == false) {
    header("location: ./login.php");
    exit();
}
?>