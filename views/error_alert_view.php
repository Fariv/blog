<?php if ( isset( $_SESSION["errorMessage"] ) ) { ?>
    <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
        <?php echo $_SESSION["errorMessage"]; ?>
        <?php unset( $_SESSION["errorMessage"] ); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>