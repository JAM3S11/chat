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

<!DOCTYPE html>
<html>
<head>
    <title>Messenger</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="navbar">
        <div class="new-chat">
            <span class="new-chat-icon" onclick="startNewChat()">&#x2b;</span>
        </div>
        <ul class="chatlist">
            <?php
            $sql = "SELECT * FROM chats";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li onclick="selectChat(\'' . $row["chat_name"] . '\')">' . $row["chat_name"] . '</li>';
                }
            }
            ?>
        </ul>
    </div>
    
   <div class="content">
    <div id="selectedChat">Chat Name</div>
    <div id="chatMessages" class="chat-messages"></div>
    <div class="message-input-container">
        <input type="text" id="messageInput" placeholder="Type your message">
        <button onclick="sendMessage()">Send</button>
        <label for="fileInput" class="file-upload-icon" title="Upload File">&#128206;</label>
        <input type="file" id="fileInput" class="file-input" onchange="updateMessageInputValue()">
    </div>
</div>

    <script>
        let selectedChat = '';
        let messages = {};
        
        
        function fetchChatMessages() {
            fetch('get_messages.php?chat=' + selectedChat)
                .then(response => response.json())
                .then(data => {
                    messages[selectedChat] = data;
                    renderMessages();
                })
                .catch(error => {
                    console.error('Error fetching chat messages:', error);
                });
        }
        
        function selectChat(chatName) {
            document.getElementById('selectedChat').innerHTML = chatName;
            selectedChat = chatName;
            fetchChatMessages();
        }
        
       function startNewChat() {
    fetch('get_users.php')
        .then(response => response.json())
        .then(data => {
            const usernames = data;
            const userList = usernames.map(username => `<li onclick="selectUser('${username}')">${username}</li>`).join('');
            const userListHtml = `<ul>${userList}</ul>`;

            const modalContainer = document.createElement('div');
            modalContainer.classList.add('modal-container');
            modalContainer.innerHTML = `
                <div class="modal">
                    <h2>Select User</h2>
                    ${userListHtml}
                </div>
            `;

            document.body.appendChild(modalContainer);
        })
        .catch(error => {
            console.error('Error fetching user list:', error);
        });
}

function selectUser(username) {
    fetch('messenger.php', {
        method: 'POST',
        body: new URLSearchParams({
            newChatName: username
        })
    })
        .then(response => response.text())
        .then(() => {
            renderChatList();
            closeChatModal();
        })
        .catch(error => {
            console.error('Error starting new chat:', error);
        });
}

function closeChatModal() {
    const modalContainer = document.querySelector('.modal-container');
    if (modalContainer) {
        document.body.removeChild(modalContainer);
    }
}

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value.trim();
            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];
            
            if (message || file) {
                const formData = new FormData();
                formData.append('chat', selectedChat);
                formData.append('content', message);
                formData.append('file', file);
                
                fetch('send_message.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.text())
                    .then(() => {
                        messageInput.value = '';
                        fileInput.value = '';
                        fetchChatMessages();
                        updateMessageInputValue(); // Reset the message input value after sending the message
                    })
                    .catch(error => {
                        console.error('Error sending message:', error);
                    });
            }
        }
        
        function updateMessageInputValue() {
            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];
            const messageInput = document.getElementById('messageInput');
    
            if (file) {
                messageInput.value = file.name; // Set the value of the message input to the file name
            } else {
                messageInput.value = ''; // Reset the value if no file is selected
            }
        }
        
        function renderChatList() {
            const chatlist = document.querySelector('.chatlist');
            chatlist.innerHTML = '';
            fetch('get_chats.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(chatName => {
                        const li = document.createElement('li');
                        li.textContent = chatName;
                        li.onclick = () => selectChat(chatName);
                        chatlist.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Error fetching chat list:', error);
                });
        }
        
        function renderMessages() {
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.innerHTML = '';
            
            if (messages[selectedChat]) {
                messages[selectedChat].forEach(message => {
                    const messageContainer = document.createElement('div');
                    messageContainer.classList.add('message-container');
                    messageContainer.classList.add(message.sent_by === 'me' ? 'sent' : 'received');
                    
                    const messageContent = document.createElement('div');
                    messageContent.classList.add('message');
                    messageContent.innerHTML = message.content;
                    
                    messageContainer.appendChild(messageContent);
                    
                    if (message.file) {
                        const fileLink = document.createElement('a');
                        fileLink.href = message.file;
                        fileLink.target = '_blank';
                        fileLink.textContent = message.fileName;
                        
                        const messageFile = document.createElement('div');
                        messageFile.classList.add('message-file');
                        messageFile.appendChild(fileLink);
                        
                        messageContainer.appendChild(messageFile);
                    }
                    
                    chatMessages.appendChild(messageContainer);
                });
            }
        }
        
        // Initial rendering
        renderChatList();
    </script>
</body>
</html>

