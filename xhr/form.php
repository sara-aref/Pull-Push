<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="done.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="userName">User name</label>
                <input type="text" class="form-control" name="userName" id="userName" placeholder="userName">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="room">Room no.</label>
                <select name="room" id="room" class="form-control">
                    <option selected>Select Room</option>
                    <option>App1</option>
                    <option>App2</option>
                    <option>Cloud</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Sign in</button>
        <button type="submit" class="btn btn-danger">Reset</button>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
