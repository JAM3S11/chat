<?php
require_once('messenger.php');

$selectedChat = $_GET['chat'];
$messages = getChatMessages($selectedChat);

echo json_encode($messages);
?>
