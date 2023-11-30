<?php
// Check if a file was uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Specify the directory where you want to save the uploaded files
    $uploadDirectory = 'uploads/';

    // Generate a unique file name to avoid conflicts
    $filename = uniqid() . '_' . $file['name'];

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($file['tmp_name'], $uploadDirectory . $filename)) {
        echo 'File uploaded successfully.';
    } else {
        echo 'Error uploading file.';
    }
} else {
    echo 'No file uploaded.';
}
?>
