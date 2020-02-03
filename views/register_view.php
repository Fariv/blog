<div class="container">

    <?php include "error_alert_view.php"; ?>
    <?php include "success_alert_view.php"; ?>

    <div class="row my-4">
        <div class="col-3"></div>
        <div class="col">
            <form action="logic/register.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="first_name" name="first_name" class="form-control first_name" id="first_name" value="<?php echo @$_SESSION["firstnameValue"] ?>">
                    <?php unset( $_SESSION['firstnameValue'] ); ?>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle name</label>
                    <input type="middle_name" name="middle_name" class="form-control middle_name" id="middle_name" value="<?php echo @$_SESSION["middlenameValue"] ?>">
                    <?php unset( $_SESSION['middlenameValue'] ); ?>
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="last_name" name="last_name" class="form-control last_name required" id="last_name" value="<?php echo @$_SESSION["lastnameValue"] ?>">
                    <?php unset( $_SESSION['lastnameValue'] ); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control email required" id="email" value="<?php echo @$_SESSION["emailValue"] ?>">
                    <?php unset( $_SESSION['emailValue'] ); ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control  password required" id="password">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" <?php if ( @$_SESSION['genderValue'] == "1" ) echo "checked='checked'"; ?> value="1">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" <?php if ( @$_SESSION['genderValue'] == "0" ) echo "checked='checked'"; ?> value="0">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="others" <?php if ( @$_SESSION['genderValue'] == "2" ) echo "checked='checked'"; ?> value="2">
                            <label class="form-check-label" for="others">Others</label>
                        </div>
                    </div>
                </div>
                <?php unset( $_SESSION['genderValue'] ); ?>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>

</div>