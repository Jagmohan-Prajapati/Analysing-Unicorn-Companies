<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

        body {
            background-color: #121;
            height: 100vh;
            margin: 0;
            font-family: 'Ubuntu', sans-serif;
        }

        /* .container{
            width: 300px;
            height: 250px;
            background: #123;
            
        } */

        h2 {
            /* margin-top: 300px; */
            text-align: center;
            color: white;
        }

        .buttons-container {
            text-align: center;
        }

        .login-button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            font-weight: bold;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            background-color: #f0f0f0;
            width: 20%;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
            background: #6060f1;
        }

        .login-button:hover {
            background-color: black;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login Panel</h2>
        <div class="buttons-container">
            <button class="login-button" onclick="userLogin()">User Login</button><br>
            <button class="login-button" onclick="adminLogin()">Admin Login</button>
        </div>
    </div>
    <script>
        function userLogin() {
            // Redirect to user login page
            window.location.href = "login.php";
        }

        function adminLogin() {
            // Redirect to admin login page
            window.location.href = "admin/admin_panel.php";
        }
    </script>
</body>

</html>