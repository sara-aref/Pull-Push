<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<?php
require_once 'connect.php';

function select_user($id) {
    try {
        $pdo = connect_to_db();
        $select_query = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($select_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch(PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

if(isset($_GET['id'])) {
    $std_id = $_GET['id'];
    $old_data  = select_user($std_id);
}

?>
<div class="container">
    <h1>Edit User</h1>
    <form action="edit.php?id=<?php echo $std_id; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo $old_data['username'] ?? ''; ?>">
        </div>

      <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" value="<?php echo $old_data['email'] ?? ''; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $old_data['password'] ?? ''; ?>">
      </div>

      <div class="form-group">
        <label for="room">Room No:</label>
        <select class="form-control" id="room" name="room">
          <option value="App1" <?php echo ($old_data['room'] ?? '') === 'App1' ? 'selected' : ''; ?>>App1</option>
          <option value="App2" <?php echo ($old_data['room'] ?? '') === 'App2' ? 'selected' : ''; ?>>App2</option>
          <option value="cloud" <?php echo ($old_data['room'] ?? '') === 'cloud' ? 'selected' : ''; ?>>cloud</option>
        </select>
      </div>

      <div class="mb-3">
            <label for="image" class="form-label">Profile picture</label>
            <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
