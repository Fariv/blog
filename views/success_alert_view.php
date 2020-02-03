<?php if ( isset( $_SESSION["successMessage"] ) ) { ?>
    <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
        <?php echo $_SESSION["successMessage"]; ?>
        <?php unset( $_SESSION["successMessage"] ); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>