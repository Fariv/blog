<?php
function getFormattedValue ( $value, $key ) 
{
    if ( $key == "created_at" || $key == "modified_at" || $key == "deleted_at" ) {
        return date("d-M-Y g:i A", $value);
    } else if ( $key == "gender" ) {
        return $value == "1" ? "Male" : ( $value == "0"? "Female": "Others" );
    } else if ( $key === "remember_me" ) {
        return $value ? "Yes": "No";
    } else if ( $key === "remember_me_validation_perios" ) {
        return !empty( $value ) ? ($value/(3600*24)) . " Day(s)" : "";
    }
    return $value;
}
?>