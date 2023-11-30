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

// Function to fetch chat list from the database
function getChats() {
    global $conn;
    $sql = "SELECT * FROM chats";
    $result = $conn->query($sql);
    $chats = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $chats[] = $row['chat_name'];
        }
    }
    return $chats;
}

// Fetch chat list and return as JSON
$chats = getChats();
echo json_encode($chats);

$conn->close();
?>
