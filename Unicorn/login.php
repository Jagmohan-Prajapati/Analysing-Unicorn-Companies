<?php
include("db.php");

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if login form submitted
    if (isset($_POST['login'])) {
        $sql = "SELECT * FROM `signupforms` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                // User found, redirect to home page
                header('Location: home.php');
                exit();
            } else {
                $error = 'Invalid credentials';
            }
        } else {
            $error = 'Error occurred while logging in';
        }
    }

    // Check if sign up form submitted
    if (isset($_POST['signup'])) {
        $email = $_POST['email'];

        $sql = "SELECT * FROM `signupforms` WHERE username='$username'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                // User already exists
                $error = 'User already exists';
            } else {
                // Insert new user
                $sql = "INSERT INTO `signupforms`(username,email,password) VALUES ('$username','$email','$password')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    // User signed up successfully, redirect to home page
                    header('Location: home.php');
                    exit();
                } else {
                    // Error occurred while signing up
                    $error = 'An error occurred while signing up';
                }
            }
        } else {
            $error = 'Error occurred while signing up';
        }
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Protest+Revolution&family=Ubuntu&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

        body {
            background: #121;
        }

        .container {
            width: 800px;
            margin: auto;
            margin-top: 150px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            /* font-family: 'Protest Revolution', sans-serif; */
            font-family: 'Ubuntu', sans-serif;
            text-align: center;
            color: white;
            box-shadow: 20px 20px 20px grey;
        }

        .container:hover {
            /* background: #122; */
            background: black;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        button {
            width: 80%;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        p{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login Panel</h2>
        <p><?php echo $error; ?></p>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Enter username" required><br>
            <input type="password" name="password" placeholder="Enter password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <div class="container">
        <h2>Sign Up Panel</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Enter username" required><br>
            <input type="email" name="email" placeholder="Enter your e-mail" required><br>
            <input type="password" name="password" placeholder="Enter password" required><br>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
</body>

</html>