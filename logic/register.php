<?php 
session_start();

include_once '../connection.php';
include 'helpers/query_functions.php';

$firstName = trim( @$_POST["first_name"] );
$middleName = trim( @$_POST["middle_name"] );
$lastName = trim( @$_POST["last_name"] );
$email = @$_POST["email"];
$password = trim( @$_POST["password"] );
$gender = @$_POST["gender"];


$_SESSION['firstnameValue'] = $firstName;
$_SESSION['lastnameValue'] = $lastName;
$_SESSION['middlenameValue'] = $middleName;
$_SESSION['emailValue'] = $email;
$_SESSION['genderValue'] = $gender;
if ( empty( $lastName ) ) {
    $_SESSION['errorMessage'] = "Last name field is empty!";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
} else if ( strlen($lastName) > 50 ) {
    $_SESSION['errorMessage'] = "Last name length cannot be greater than 50 characters!";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
}

if ( empty( $email ) ) {
    $_SESSION['errorMessage'] = "Email field is empty!";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
} else if ( strlen($email) > 150 ) {
    $_SESSION['errorMessage'] = "Email length cannot be greater than 50 characters!";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
}

if ( empty( $password ) ) {
    $_SESSION['errorMessage'] = "Password field is empty!";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
} else if ( strlen( $email ) > 150 ) {
    $_SESSION['errorMessage'] = "Password value cannot be greater than 150 characters";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
}

if ( empty( $gender ) ) {
    $_SESSION['errorMessage'] = "You must choose a gender!";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
}
$currentTimeStamp = time();
$data = array(
    "first_name" => @$firstName,
    "middle_name" => @$middleName,
    "last_name" => @$lastName,
    "email" => @$email,
    "password" => md5(@$password),
    "created_at" => $currentTimeStamp,
    "modified_at" => $currentTimeStamp,
    "gender" => $gender,
    "remember_me" => "off",
);
$data = insertIntoTable ($pdo, $data, "users");
if ( ! $data ) {

    $_SESSION['errorMessage'] = "Something went wrong!";
    header("Location: ".getenv("BASE_URL")."register.php");
    exit;
} else {

    $_SESSION['successMessage'] = "You are successfully Registered";
    header("Location: http://localhost/blog");
    exit;
}