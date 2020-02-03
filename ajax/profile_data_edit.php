<?php
session_start();

include_once '../connection.php';
include '../logic/helpers/query_functions.php';
include "../logic/helpers/view_functions.php";

$fieldname = $_POST["fieldname"];
$userId = $_SESSION["loginData"]->id;
$result = getDataFromTable ($pdo, $fieldname, "users", array("id" => $userId));
$label = ucfirst( str_replace("_", " ", $fieldname) );
if ( $fieldname == "gender" ) {
    $checkedM = $checkedF = $checkedO = "";
    if ( $result->gender == "1" ) $checkedM = "checked";
    if ( $result->gender == "0" ) $checkedF = "checked";
    if ( $result->gender == "2" ) $checkedO = "checked";
    $inputview = '<div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" '. $checkedM .' value="1">
            <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female" '. $checkedF .' value="0">
            <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="others" '.$checkedO.' value="2">
            <label class="form-check-label" for="others">Others</label>
        </div>
    </div>';
} else 
    $inputview = '<input type="text" class="form-control inline-inputs" data-fieldname="'. $fieldname .'" value="'. getFormattedValue($result->{$fieldname}, $fieldname) .'">';
$view = '<div class="col-5">
    <span class="font-weight-bold">'. $label . '</span> : <span class="placeholder">'. $inputview .'</span> 
</div>
<div class="col-1">
    <button class="btn btn-link save" data-fieldname="'.$fieldname.'"><img class="save-profile" src="'.getenv("BASE_URL").'assets/icons/save.svg"></button>
</div>';
echo json_encode(array("status" => 1, "view" => $view));
?>
