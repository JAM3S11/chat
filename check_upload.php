<?php

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

   
    $uploadDirectory = 'uploads/';

   
    $filename = uniqid() . '_' . $file['name'];

   
    if (move_uploaded_file($file['tmp_name'], $uploadDirectory . $filename)) {
        echo 'File uploaded successfully.';
    } else {
        echo 'Error uploading file.';
    }
} else {
    echo 'No file uploaded.';
}
?>
