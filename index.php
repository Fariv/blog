<?php 
error_reporting(E_ALL);
session_start();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Ashraf's Blog</title>
</head>
<body>
    <?php include 'views/navbar_view.php'; ?>

    <div class="container">
        <?php include "views/error_alert_view.php"; ?>
        <?php include "views/success_alert_view.php"; ?>
        <?php if( @$_SESSION["loginData"] ) { ?>
            <h5>You just landed at main post area</h5>
        <?php } ?>
    </div>
</body>
</html>