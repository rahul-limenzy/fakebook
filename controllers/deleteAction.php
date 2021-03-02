<?php
include 'session.php';
include '../models/user.php';
$id = $_POST['id'];

if ($userObj->dbDeleteId($id))
{
    echo "<script> alert('Deleted successfully!');
    window.location = '../views/list.php';
    </script>";
}

