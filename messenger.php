<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function getChatMessages($selectedChat) {
    global $conn;
    $sql = "SELECT * FROM messages WHERE chat_name = '$selectedChat'";
    $result = $conn->query($sql);
    $messages = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }
    return $messages;
}


function insertChatMessage($selectedChat, $content, $sentBy) {
    global $conn;
    $sql = "INSERT INTO messages (chat_name, content, sent_by) VALUES ('$selectedChat', '$content', '$sentBy')";
    $conn->query($sql);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newChatName"])) {
    $newChatName = $_POST["newChatName"];
    $sql = "INSERT INTO chats (chat_name) VALUES ('$newChatName')";
    $conn->query($sql);
}
?>
