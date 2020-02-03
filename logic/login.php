<?php 
session_start();

include_once '../connection.php';
include 'helpers/query_functions.php';

$email = trim( @$_POST["email"] );
$password = trim( @$_POST["password"] );
$remember_me = @$_POST["remember_me"];


$_SESSION['emailValue'] = $email;
if ( empty( $email ) ) {
    $_SESSION['errorMessage'] = "Email field is empty!";
    header("Location: ".getenv("BASE_URL")."login.php");
    exit;
} else if ( strlen($email) > 150 ) {
    $_SESSION['errorMessage'] = "Email length cannot be greater than 50 characters!";
    header("Location: ".getenv("BASE_URL")."login.php");
    exit;
}

if ( empty( $password ) ) {
    $_SESSION['errorMessage'] = "Password field is empty!";
    header("Location: ".getenv("BASE_URL")."login.php");
    exit;
} else if ( strlen( $email ) > 150 ) {
    $_SESSION['errorMessage'] = "Password value cannot be greater than 150 characters";
    header("Location: ".getenv("BASE_URL")."login.php");
    exit;
}

$data = getDataFromTable ($pdo, "*", "users", array("email" => $email, "password" => md5($password)));
if ( ! $data ) {

    $_SESSION['errorMessage'] = "Wrong Credential!";
    header("Location: ".getenv("BASE_URL")."login.php");
    exit;
} else {

    unset( $data->password );
    $_SESSION['loginData'] = $data;
    $_SESSION['successMessage'] = "You are successfully loggedin";
    header("Location: http://localhost/blog");
    exit;
}