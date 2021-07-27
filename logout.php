<?php
session_start();
$_SESSION['db_user_id'] = null;

$_SESSION['status'] = "Successfully Log-out!!!";
$_SESSION['status_code'] = "error";
header("Location: ./login.php");
