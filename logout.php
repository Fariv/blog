<?php
session_start();

session_destroy();

$_SESSION['successMessage'] = "You are logged out successfully!";

header("Location: http://localhost/blog");
?>