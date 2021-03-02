<?php

session_start();

$allPages = ['dashboard', 'edit', 'list', 'moreDetails', 'deleteAction', 'editAction', 'moreDetailsAction'];
$adminOnly = ['list', 'deleteAction'];
$currentPage = basename(__FILE__, '.php');

if (in_array($currentPage, $allPages)) {
    if (empty($_SESSION['email'])) {
        header("Location: ../index.php");
        exit;
    }
}

if (in_array($currentPage, $adminOnly)) {
    if ($_SESSION['email'] != 'admin') {
        header("Location: ../dashboard.php");
        exit;
    }
}

if ($currentPage == 'index') {
    if (!empty($_SESSION['email'])) {
        if ($_SESSION['email'] == 'admin') {
            header("Location: /views/list.php");
            exit;
        } else {
            header("Location: /views/dashboard.php");
            exit;
        }
    }
}
