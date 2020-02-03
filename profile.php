<?php 
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
    <link rel="stylesheet" href="<?php echo getenv("BASE_URL"); ?>assets/css/profile.css">

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
        <?php include "views/profile_view.php"; ?>
    </div>
</body>
</html>