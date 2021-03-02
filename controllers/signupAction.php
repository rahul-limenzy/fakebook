<?php
include '../models/user.php';

$error=[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $userObj->getData($_POST,$_FILES);
    $error = $userObj->validate();
}
if (empty($error) && isset($_POST['submit'])) {

    $userObj->saveData();
    move_uploaded_file($_FILES['dp']['tmp_name'], '../uploads/' . $_FILES['dp']['name']); //image moved
    echo 
        "<div class='container'>
            <div class='row'>
                <div class='alert alert-success mx-auto' role='alert'>
                    <h4>success!</h4>
                    <p> welcome to fakebook! please<a href ='../index.php' class='alert-link'> login </a>to continue.</p> 
                </div>
            </div>
        </div>";
}
