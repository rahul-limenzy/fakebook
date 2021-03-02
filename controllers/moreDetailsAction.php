<?php
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
}

echo 'hello';
if (isset($_POST['submit']))
{
    //insert to education table

    var_dump($id);
    die();
}