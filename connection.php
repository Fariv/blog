<?php 
if (file_exists(__DIR__ . '/.env')) {
    include "vendor/autoload.php";

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

// connect to the postgresql database
$connectionString = sprintf(
    "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",  
    getenv('HOST'),  
    getenv('PORT'),  
    getenv('DB'), 
    getenv('USER'), 
    getenv('PASSWORD')
);
var_dump(getenv('HOST'));
try {
    $pdo = new \PDO($connectionString);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch ( PDOException $e ) {
    var_dump($e);
}