<?php
ob_start();
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'admin_template');
if (!$conn) {
    echo "We Are Not Connecting!!";
}
