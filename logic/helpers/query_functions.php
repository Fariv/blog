<?php 
function getDataFromTable ($pdo, $fields, $table, $condition, $operator="AND") 
{
    $selectFields = $fields;
    if ( is_array($fields) )
        $selectFields = implode(",", $fields);
    
    $query = "SELECT {$selectFields} FROM {$table}";

    // WHERE email = :email AND password = :password

    $q = array();
    foreach( $condition as $field => $value ) {
        $q[] = "{$field} = :{$field}";
    }
    $query .= " WHERE " . implode(" {$operator} ", $q);
    $stmt = $pdo->prepare($query);

    // bind value to the :id parameter
    foreach( $condition as $field => $value ) {
        $stmt->bindValue(":{$field}", $value);
    }

    // execute the statement
    $stmt->execute();

    // return the result set as an object
    return $stmt->fetchObject();
}

function insertIntoTable ($pdo, $data, $table)
{
    $fields = array_keys($data);
    $insertFields = implode(",", $fields);
    $modFields = array_map(function($value) {
        return ':'.$value;
    }, $fields);
    $placeholders = implode(",", $modFields);
    $sql = "INSERT INTO {$table} ({$insertFields}) VALUES({$placeholders})";
    $stmt = $pdo->prepare($sql);

    foreach ($data as $field => $value) {
        $stmt->bindValue(':' . $field, $value);
    }
    $stmt->execute();
    $id = $pdo->lastInsertId($table.'_id_seq');
    if ( $id ) return array( $id => $data );
    return false;
}

function updateIntoTable ($pdo, $data, $table, $condition)
{
    // sql statement to update a row in the stock table
    $sql = "UPDATE {$table}";

    $fields = array_keys($data);
    $conditionfields = array_keys($condition);
    $modFields = array_map(function($value) {
        return $value. ' = :'.$value;
    }, $fields);
    
    $modConditionFields = array_map(function($value) {
        return $value. ' = :'.$value;
    }, $conditionfields);
    
    $sql .= " SET " . implode(", ", $modFields);
    $sql .= " WHERE " . implode(", ", $modConditionFields);

    $stmt = $pdo->prepare($sql);

    // bind values to the statement
    foreach( $data as $key => $value ) {
        $stmt->bindValue(':'.$key, $value);
    }
    foreach( $condition as $key => $value ) {
        $stmt->bindValue(':'.$key, $value);
    }
    // update data in the database
    $stmt->execute();

    // return the number of row affected
    return array( "numberOfRowAffected" => $stmt->rowCount(), "data" => $data );
}