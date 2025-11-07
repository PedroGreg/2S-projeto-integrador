<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("location: ./login.php");
    exit();
}
?>