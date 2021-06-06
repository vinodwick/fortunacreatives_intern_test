<?php

include 'vendor/autoload.php';
$id = $_POST['id'];
//var_dump($id);
$email = $_POST['email'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];

$user = new \Classes\User();
$user->setId($id);
$user->setFirstName($firstName);
$user->setEmail($email);
$user->setLastName($lastName);
if ($user->update()) {
    header('location:list.php');
} echo "Error While Updating";
