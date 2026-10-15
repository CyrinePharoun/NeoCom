<?php
session_start();
unset($_SESSION['admin']);
session_destroy();
    header("location:/FINAL%20PROJECT%20NeoCom/admin.php");
?>