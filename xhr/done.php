<?php
require_once 'connect.php';

function insertData(){
    try {
        $conn = connect_to_db();

        $insert_query = "INSERT INTO users (username, email, password, room) VALUES (:username, :email, :password, :room)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bindParam(':username', $_POST["userName"]);
        $stmt->bindParam(':email', $_POST["email"]);
        $stmt->bindParam(':password', $_POST["password"]);
        $stmt->bindParam(':room', $_POST["room"]);
        
        $res = $stmt->execute();
        if($res === true){
            header("Location: table.php");
            exit;
        } else {
            echo "Failed to insert data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } 
}

insertData();
?>
