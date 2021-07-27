<?php
include('../includes/dbcon.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // 
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_name = $row['name'];

            if ($db_user_id == $row['user_id'] && $db_username == $row['username'] && $db_name == $row['name']) {
                $_SESSION['db_user_id'] = $db_user_id;
                $_SESSION['db_username'] = $db_username;
                $_SESSION['db_name'] = $db_name;
                $_SESSION['status'] = "Login Successfully";
                $_SESSION['status_code'] = "success";
                header("Location: ../index.php");
            } else {
                header("Location: ../login.php");
            }
            // 
        } else {
            $_SESSION['status'] = "Password Not Currect !!!";
            $_SESSION['status_code'] = "warning";
            header("Location: ../../register.php");
        }
    } else {
        $_SESSION['status'] = "Create A New Membership !";
        $_SESSION['status_code'] = "error";
        header("Location: ../../register.php");
    }
}
