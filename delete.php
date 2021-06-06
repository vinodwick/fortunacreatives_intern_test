<?php

include 'vendor/autoload.php';
$id = $_GET['id'];
//var_dump($id);


$user = new \Classes\User();
$user->setId($id);
//var_dump($user);
if ($user->delete()) {
    header('location:list.php');
} echo "Error While Deleting Record";
