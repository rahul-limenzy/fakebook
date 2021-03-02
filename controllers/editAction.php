<?php
include 'session.php';
include '../models/user.php';

$result = [];
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $thisUser = $userObj->dbSearchId($id);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $thisUser = $userObj->dbSearchId($id);
    if ($_FILES['dp']['size'] == 0) {
        $userObj->getData($_POST);
    } else {
        $userObj->getData($_POST, $_FILES);
    }
    $error = $userObj->validate(true);
}

if (isset($_POST['submit']) && empty($error)) {
    success();
}

function success()
{
    global $id, $userObj;

    if ($_FILES['dp']['size'] != 0) {
        move_uploaded_file($_FILES['dp']['tmp_name'], '../uploads/' . $_FILES['dp']['name']); //image moved    
    }

    if ($userObj->updateData($id)) {
        echo "<script> 
             alert('Updated successfully!'); 
             window.location = 'list.php'; 
         </script>";
    }
}
