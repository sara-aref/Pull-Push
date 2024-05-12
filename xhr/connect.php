<?php
const DB_USER = 'sara';
const DB_PASSWORD = 'S@r@1234';

function connect_to_db(){
    try {
        $dsn = "mysql:host=localhost;dbname=osad44;port=3306";
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "<h3 style='color:red'>{$e->getMessage()}</h3>";
        return false;
    }
}

function create(){
    $pdo = connect_to_db();
    if (!$pdo) {
        return;
    }

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) UNIQUE,
        email VARCHAR(255) UNIQUE,
        password VARCHAR(255),
        room VARCHAR(255)
    )";

    try {
        $pdo->exec($sql);
    } catch (PDOException $e) {
        echo "Error creating table: " . $e->getMessage();
    }
}

create(); 

?>