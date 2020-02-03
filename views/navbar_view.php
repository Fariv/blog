<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo getenv("BASE_URL") ?>">Ashraf's Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline mr-auto my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav">
            <?php if ( empty( @$_SESSION["loginData"] ) )  { ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <?php } else { 
                $loginData = @$_SESSION["loginData"];?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="loggedInDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ( !empty( @$loginData->profile_image ) ) { 
                        $profileImage = $loginData->profile_image;
                    } else {
                        $profileImage = getenv("BASE_URL")."assets/icons/user.svg";
                    } ?>
                    <img src="<?php echo @$profileImage; ?>" class="rounded float-left" >
                    <span class="ml-2"><?php echo implode(" ", array( @$loginData->first_name, @$loginData->middle_name, @$loginData->last_name )); ?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="loggedInDropdown">
                    <a class="dropdown-item" href="<?php echo getenv("BASE_URL") ?>profile.php">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo getenv("BASE_URL") ?>logout.php">Logout</a>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>