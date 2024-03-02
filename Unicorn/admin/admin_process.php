<?php
session_start();
// Check if username and password are correct
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Your MySQL connection code here
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "unicorn";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM admin_users WHERE admin_name='$username' AND admin_password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Admin login successful
        $_SESSION['admin_name'] = $username;
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
    } else {
        // Admin login failed
        echo "Invalid username or password";
    }
    $conn->close();
}
?>
