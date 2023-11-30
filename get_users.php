<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch usernames from the users table
$sql = "SELECT username FROM users";
$result = $conn->query($sql);

$usernames = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usernames[] = $row['username'];
    }
}

// Return the usernames as JSON response
header('Content-Type: application/json');
echo json_encode($usernames);

$conn->close();
?>
