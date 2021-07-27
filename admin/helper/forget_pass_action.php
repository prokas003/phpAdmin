<?php
include('../includes/dbcon.php');

if (isset($_POST['forget_pass'])) {
    $for_email_phone = $_POST['for_email_phone'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];

    $for_email_phone = mysqli_real_escape_string($conn, $for_email_phone);
    $password = mysqli_real_escape_string($conn, $password);
    $repass = mysqli_real_escape_string($conn, $repass);

    if ($password === $repass) {
        // Password was Right
        // Password was Right
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $forget_pass_sql = "SELECT * FROM `users` WHERE `email` = '$for_email_phone' OR `phone` = '$for_email_phone'";
        $forget_pass_result = mysqli_query($conn, $forget_pass_sql);
        if (mysqli_num_rows($forget_pass_result) == 1) {
            while ($row = mysqli_fetch_assoc($forget_pass_result)) {
                $forget_user_id = $row['user_id'];
                // forget password update
                $update_pass_sql = "UPDATE `users` SET `password` = '$password_hash' WHERE `user_id` = '$forget_user_id'";
                $update_pass_result = mysqli_query($conn, $update_pass_sql);
                if ($update_pass_result) {
                    $_SESSION['status'] = "Password Update Successfully !!!";
                    $_SESSION['status_code'] = "success";
                    header("Location: ../../login.php");
                } else {
                    $_SESSION['status'] = "Password & Re-password Should be Same !!!";
                    $_SESSION['status_code'] = "warning";
                    header("Location: ../../forget_password.php");
                }
            }
        }
    } else {
        // Password was Rong
        $_SESSION['status'] = "Password & Re-password Should be Same !!!";
        $_SESSION['status_code'] = "warning";
        header("Location: ../../forget_password.php");
    }



    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) == 1) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $db_user_id = $row['user_id'];
    //         $db_username = $row['username'];
    //         $db_name = $row['name'];
    //         $db_password = $row['password'];

    //         if ($db_user_id == $row['user_id'] && $db_username == $row['username'] && $db_name == $row['name']) {
    //             $_SESSION['db_user_id'] = $db_user_id;
    //             $_SESSION['db_username'] = $db_username;
    //             $_SESSION['db_name'] = $db_name;
    //             $_SESSION['status'] = "Login Successfully";
    //             $_SESSION['status_code'] = "success";
    //             header("Location: ../index.php");
    //         } else {
    //             header("Location: ../login.php");
    //         }
    //     }
    // } else {
    //     $_SESSION['status'] = "Create A New Membership !";
    //     $_SESSION['status_code'] = "error";
    //     header("Location: ../../register.php");
    // }
}
