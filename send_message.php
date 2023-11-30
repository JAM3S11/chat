<?php
require_once('messenger.php');

$selectedChat = $_POST['chat'];
$content = $_POST['content'];
$sentBy = 'me';

if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['file'];
    
    
    $allowedDirectory = 'uploads/';
    $filePath = $allowedDirectory . basename($file['name']);
    
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        insertChatMessage($selectedChat, $content, $sentBy, $filePath);
    } else {
       
        echo 'Error uploading file';
    }
} else {
    
    insertChatMessage($selectedChat, $content, $sentBy);
}
?>
