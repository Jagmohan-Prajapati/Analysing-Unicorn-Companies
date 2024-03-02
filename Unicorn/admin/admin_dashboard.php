<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_panel.php"); // Redirect back to login page if not logged in
    exit();
}

// Database connection
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "unicorn";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add data to database
if (isset($_POST['add'])) {
    $Company = $_POST['Company'];
    $Valuation = $_POST['Valuation'];
    $Date_Joined = $_POST['Date_Joined'];
    $Industry = $_POST['Industry'];
    $City = $_POST['City'];
    $Country = $_POST['Country'];
    $Continent = $_POST['Continent'];
    $Year_Founded = $_POST['Year_Founded'];
    $Funding = $_POST['Funding'];
    $Select_Investors = $_POST['Select_Investors'];
    // You can add more fields as per your database structure

    $sql = "INSERT INTO `unicorn_data`(`Company`, `Valuation`, `Date Joined`, `Industry`, `City`, `Country`, `Continent`, `Year Founded`, `Funding`, `Select Investors`) VALUES ('$Company','$Valuation','$Date_Joined','$Industry','City','$Country','$Continent','$Year_Founded','$Funding','$Select_Investors')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added to data successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Add Analysed data to database
if (isset($_POST['add_ana'])) {
    $Company = $_POST['Company'];
    $Valuation = $_POST['Valuation'];
    $Date_Joined = $_POST['Date_Joined'];
    $Industry = $_POST['Industry'];
    $City = $_POST['City'];
    $Country = $_POST['Country'];
    $Continent = $_POST['Continent'];
    $Year_Founded = $_POST['Year_Founded'];
    $Funding = $_POST['Funding'];
    $Select_Investors = $_POST['Select_Investors'];
    $time= $_POST['time'];
    $est_eva= $_POST['est_eva'];
    $initial_eva= $_POST['initial_eva'];
    // You can add more fields as per your database structure

    $sql = "INSERT INTO `ex`(`Company`, `Valuation`, `Date Joined`, `Industry`, `City`, `Country`, `Continent`, `Year Founded`, `Funding`, `Select Investors`, `Time`, `Estimated Evaluation`, `Initial Evaluation`) VALUES ('$Company','$Valuation','$Date_Joined','$Industry','City','$Country','$Continent','$Year_Founded','$Funding','$Select_Investors','$time','$est_eva','$initial_eva')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added to Analyzed data successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Remove data from database
if (isset($_POST['remove'])) {
    $id = $_POST['Company'];

    $sql = "DELETE FROM `unicorn_data` WHERE Company='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record removed successfully from data";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Add new admin
if (isset($_POST['add_admin'])) {
    $admin_username = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    $sql = "INSERT INTO admin_users (admin_name, admin_password) VALUES ('$admin_username', '$admin_password')";

    if ($conn->query($sql) === TRUE) {
        echo "New admin added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>

<body>
    <div class="container">
    <h2>Welcome,
        <?php echo $_SESSION['admin_name']; ?>!
    </h2>
    <a href="logout.php">Logout</a>
    
    <div class="container1">
    <!-- Add Data Form -->
    <h3>Add Data</h3>
    <form action="" method="POST">
        <label for="name">Company Name:</label>
        <input type="text" id="name" name="Company" required><br><br>
        <label for="name">Valuation:</label>
        <input type="text" id="email" name="Valuation" required><br><br>
        <label for="name">Date Joined:</label>
        <input type="text" id="email" name="Date_Joined" required><br><br>
        <label for="name">Industry:</label>
        <input type="text" id="email" name="Industry" required><br><br>
        <label for="name">City:</label>
        <input type="text" id="email" name="City" required><br><br>
        <label for="name">Country:</label>
        <input type="text" id="email" name="Country" required><br><br>
        <label for="name">Continent:</label>
        <input type="text" id="email" name="Continent" required><br><br>
        <label for="name">Year Founded:</label>
        <input type="text" id="email" name="Year_Founded" required><br><br>
        <label for="name">Funding:</label>
        <input type="text" id="email" name="Funding" required><br><br>
        <label for="name">Investers:</label>
        <input type="text" id="email" name="Select_Investors" required><br><br>
        <button type="submit" name="add">Add</button>
    </form>
    </div>

    <div class="container1">
    <!-- Add Analysed Data Form -->
    <h3>Add Analyzed Data</h3>
    <form action="" method="POST">
        <label for="name">Company Name:</label>
        <input type="text" id="name" name="Company" required><br><br>
        <label for="name">Valuation:</label>
        <input type="text" id="email" name="Valuation" required><br><br>
        <label for="name">Date Joined:</label>
        <input type="text" id="email" name="Date_Joined" required><br><br>
        <label for="name">Industry:</label>
        <input type="text" id="email" name="Industry" required><br><br>
        <label for="name">City:</label>
        <input type="text" id="email" name="City" required><br><br>
        <label for="name">Country:</label>
        <input type="text" id="email" name="Country" required><br><br>
        <label for="name">Continent:</label>
        <input type="text" id="email" name="Continent" required><br><br>
        <label for="name">Year Founded:</label>
        <input type="text" id="email" name="Year_Founded" required><br><br>
        <label for="name">Funding:</label>
        <input type="text" id="email" name="Funding" required><br><br>
        <label for="name">Investers:</label>
        <input type="text" id="email" name="Select_Investors" required><br><br>
        <label for="name">Time_to_reach</label>
        <input type="text" id="email" name="time" required><br><br>
        <label for="name">Estimated Evaluation</label>
        <input type="text" id="email" name="est_eva" required><br><br>
        <label for="name">Initial Evaluation</label>
        <input type="text" id="email" name="initial_eva" required><br><br>
        <button type="submit" name="add_ana">Add</button>
    </form>
    </div>

    <!-- Remove Data Form -->
    <div class="container1">
    <h3>Remove Data</h3>
    <form action="" method="POST">
        <label for="id">Company name:</label>
        <input type="text" id="id" name="Company" required><br><br>
        <button type="submit" name="remove">Remove</button>
    </form>
    </div>

    <div class="container1">
    <!-- Add Admin Form -->
    <h3>Add Admin</h3>
    <form action="" method="POST">
        <label for="admin_username">Admin name:</label>
        <input type="text" id="admin_username" name="admin_name" required><br><br>
        <label for="admin_password">Admin Password:</label>
        <input type="password" id="admin_password" name="admin_password" required><br><br>
        <button type="submit" name="add_admin">Add Admin</button>
    </form>
    </div>
    
    </div>
</body>

</html>