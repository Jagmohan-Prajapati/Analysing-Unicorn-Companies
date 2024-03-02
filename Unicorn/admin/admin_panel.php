<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_panel.css">
</head>

<body>
    <div class="container">
        <h2>Admin Panel</h2>
        <form action="admin_process.php" method="POST">
            <!-- <label for="username">Username:</label> -->
            <input type="text" id="username" name="username" placeholder="Enter admin name" required><br><br>
            <!-- <label for="password">Password:</label> -->
            <input type="password" id="password" name="password" placeholder="Enter password" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>