<?php
include 'models/user.php';
include 'session.php';
$loginError = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['email'] == "admin") {                   //admin access
        if ($_POST['password'] == "admin") {
            $_SESSION['email'] = 'admin';
            header("Location: views/list.php");
            exit;
        } else {
            $loginError['password'] = 'wrong password!';
        }
    } else {
        $result = $userObj->dbSearchEmail($_POST['email']);  //user access
        if (empty($result)) {
            $loginError['email'] = 'email not registered!';
        } elseif (!password_verify($_POST['password'], $result['password'])) {
            $loginError['password'] = 'wrong password!';
        } else {
            $_SESSION['email'] = $_POST['email'];
            header("Location: views/dashboard.php");
            exit;
        }
    }
}
