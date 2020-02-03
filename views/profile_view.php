<?php include "logic/helpers/view_functions.php";
include_once 'connection.php';
include 'logic/helpers/query_functions.php'; ?>

<div class="row mt-2 mb-3">
    <?php 
    $loginSessionData = @$_SESSION["loginData"];
    $loginData = getDataFromTable ($pdo, "*", "users", array("id" => $loginSessionData->id));
    unset($loginData->password);
    if ( !empty( @$loginData->profile_image ) ) { 
        $profileImage = $loginData->profile_image;
    } else {
        $profileImage = getenv("BASE_URL") . "assets/icons/user.svg";
    } ?>
    <div class="col-2">
        <img width="124" src="<?php echo @$profileImage; ?>" class="profile-image rounded float-left" >
    </div>
    <div class="col-5">
        <span id="profileName" class="ml-2 text-uppercase"><?php echo implode(" ", array( @$loginData->first_name, @$loginData->middle_name, @$loginData->last_name )); ?></span>
    </div>
    <div class="col-1"></div>
    <div class="col-4">
        <div class="create-time-log">
            <span><span class="font-weight-bold">Created At:</span> <?php echo getFormattedValue($loginData->created_at, "created_at"); ?></span>
            <br>
            <span><span class="font-weight-bold">Modified At:</span> <?php echo getFormattedValue($loginData->modified_at, "modified_at"); ?></span>
        </div>
    </div>
</div>

<?php foreach( @$loginData as $key => $value ) { 
    if ( $key == "id" || $key == "deleted_at" || $key == "created_at" || $key == "modified_at" ) continue; ?>
    <div class="row mt-1 mb-2" data-fieldname="<?php echo $key ?>">
        <?php $fieldName = ucfirst( str_replace("_", " ", $key) ); ?>
        <?php if ( $key == "profile_image" ) { 
            if ( empty( $value ) ) { ?>
            <div class="col-5">
            <form>
                <label class="font-weight-bold"><?php echo $fieldName; ?></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="profileImage" name="profile_image" accept="image/*">
                    <label class="custom-file-label" for="customFile">Choose profile image</label>
                </div>

            </form>
            </div>
            <?php } else { ?>
                <div class="col-5"><span class="font-weight-bold"><?php echo $fieldName ?></span> : <img class="edit-profile" data-fieldname="<?php echo $key; ?>" src="<?php echo $value; ?>" alt=""/> </div>
                <div class="col-1"><button class="btn btn-link edit" data-field="<?php echo $key ?>"><img class="edit-profile" data-fieldname="<?php echo $key; ?>" src=getenv("BASE_URL") . "assets/icons/edit.svg"></button></div>
            <?php } ?> 
        <?php } else { ?> 
        <div class="col-5">
            <span class="font-weight-bold"><?php echo $fieldName ?></span> : <span class="placeholder"><?php echo getFormattedValue($value, $key); ?> </span> 
        </div>
        <div class="col-1">
            <button class="btn btn-link edit" data-fieldname="<?php echo $key ?>"><img class="edit-profile" src="<?php echo getenv("BASE_URL"); ?>assets/icons/edit.svg"></button>
        </div>
    <?php } ?> 
    </div>
<?php } ?>
<script>
var baseUrl = "<?php echo getenv("BASE_URL"); ?>";
</script>
<script src="<?php echo getenv("BASE_URL"); ?>assets/js/profile.js"></script>