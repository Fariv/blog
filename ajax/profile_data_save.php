<?php
session_start();

include_once '../connection.php';
include '../logic/helpers/query_functions.php';
include "../logic/helpers/view_functions.php";

$fieldname = trim( $_POST["fieldname"] );
$inputValue = trim( $_POST["inputValue"] );
$userId = $_SESSION["loginData"]->id;
$result = updateIntoTable ($pdo, array($fieldname => $inputValue, "modified_at" => time()), "users", array("id" => $userId));
$label = ucfirst( str_replace("_", " ", $fieldname) );
$valueview = getFormattedValue($inputValue, $fieldname);
$view = '<div class="col-5">
    <span class="font-weight-bold">'. $label . '</span> : <span class="placeholder">'. $valueview .'</span> 
</div>
<div class="col-1">
    <button class="btn btn-link edit" data-fieldname="'.$fieldname.'"><img class="edit-profile" src="'.getenv("BASE_URL").'assets/icons/edit.svg"></button>
</div>';
echo json_encode(array("status" => 1, "view" => $view, "result" => $result));
?>
