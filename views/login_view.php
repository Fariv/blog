<div class="container">

    <?php include "error_alert_view.php"; ?>
    <?php include "success_alert_view.php"; ?>

    <div class="row my-4">
        <div class="col-3"></div>
        <div class="col">
            <form action="logic/login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control email required" id="email" value="<?php echo @$_SESSION["emailValue"] ?>">
                    <?php unset( $_SESSION['emailValue'] ); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control  password required" id="password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="remember_me" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>

</div>