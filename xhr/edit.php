<?php
require_once 'connect.php';

if(isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['room'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $room = $_POST['room'];

    try {
        $pdo = connect_to_db();
        $update_query = "UPDATE users SET username=:username, email=:email, password=:password, room=:room WHERE id=:id";
        $stmt = $pdo->prepare($update_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':room', $room);
        $stmt->execute();
        header("Location: table.php");
        exit;
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
