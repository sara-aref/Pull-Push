<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connect.php';

function selectData() {
    try {
        $pdo = connect_to_db();
        $select_query = "SELECT * FROM users";
        $stmt = $pdo->prepare($select_query);
        $res = $stmt->execute();
        
        if ($res == true) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            display_table($row);
        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

function display_table($rows) {
    echo "<table class='table'> <tr> <th>ID</th> <th>User Name</th> <th>Email</th> <th>Password</th> <th>Room</th> <th>Edit</th> <th>Delete</th> </tr>";
    try {
        foreach ($rows as $row) {
            $url_query_string = $row['id'];
            $delete_url = "delete.php?id={$url_query_string}";
            $edit_url = "editForm.php?id={$url_query_string}";

            echo "<tr id='row_{$row['id']}'>";
            foreach ($row as $value) {
                echo "<td>{$value}</td>";
            }
            echo "<td><a href='{$edit_url}' class='btn btn-warning'>Edit</a></td>";
            echo "<td><a href='#' class='btn btn-danger btn-delete' data-id='{$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

selectData();
?>

<script src="xhr.js"></script>
