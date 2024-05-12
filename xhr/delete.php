<?php
require_once 'connect.php';

$response = array();

if(isset($_GET['id'])) {
    $std_id = $_GET['id'];

    try {
        $pdo = connect_to_db();
        $delete_query = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($delete_query);
        $stmt->bindParam(':id', $std_id, PDO::PARAM_INT);
        $res = $stmt->execute();
        
        if($res) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = "Failed to delete row.";
        }
    } catch(PDOException $e) {
        $response['success'] = false;
        $response['message'] = $e->getMessage();
    }
} else {
    $response['success'] = false;
    $response['message'] = "Row ID not provided.";
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
