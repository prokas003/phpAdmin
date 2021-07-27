<?php
include('../includes/dbcon.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];

    $file =  $_FILES['image']['name'];
    $rand = rand('111111111', '999999999');
    $images = $rand . '_' . $file;
    $location = move_uploaded_file($_FILES['image']['tmp_name'], '../images/users/' . $images);

    // valadition
    $name = mysqli_real_escape_string($conn, $name);
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $password = mysqli_real_escape_string($conn, $password);
    $repass = mysqli_real_escape_string($conn, $repass);

    if (empty($username)) {
        $_SESSION['status'] = "Username Fild Are Required !!!";
        $_SESSION['status_code'] = "warning";
        header("Location: ../../register.php");
    } elseif (empty($email)) {
        $_SESSION['status'] = "Email Fild Are Required !!!";
        $_SESSION['status_code'] = "warning";
        header("Location: ../../register.php");
    } elseif (empty($phone)) {
        $_SESSION['status'] = "Phone Number Fild Are Required !!!";
        $_SESSION['status_code'] = "warning";
        header("Location: ../../register.php");
    } elseif (empty($password)) {
        $_SESSION['status'] = "Password Fild Are Required !!!";
        $_SESSION['status_code'] = "warning";
        header("Location: ../../register.php");
    } elseif (empty($repass)) {
        $_SESSION['status'] = "Re-Password Fild Are Required !!!";
        $_SESSION['status_code'] = "warning";
        header("Location: ../../register.php");
    } elseif ($password === $repass) {
        // Password was Right
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $reg_sql = "INSERT INTO `users`(`name`, `username`, `email`, `image`, `password`, `phone`) VALUES ('$name', '$username', '$email', '$images', '$password_hash', '$phone')";
        $reg_result = mysqli_query($conn, $reg_sql);
        if ($reg_result) {
            $_SESSION['status'] = "User Insert Successfully !!!";
            $_SESSION['status_code'] = "success";
            header("Location: ../../login.php");
        } else {
            $_SESSION['status'] = "User Insert Not Succesfully Try Again !!!";
            $_SESSION['status_code'] = "error";
            header("Location: ../../register.php");
        }


        // 
    } else {
        // Password was Rong
        $_SESSION['status'] = "Password & Re-password Should be Same !!!";
        $_SESSION['status_code'] = "warning";
        header("Location: ../../register.php");
    }
}
