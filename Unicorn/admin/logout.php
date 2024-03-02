<?php
session_start();
session_destroy(); // Destroy all sessions
header("Location: admin_panel.php"); // Redirect to login page after logout
?>
