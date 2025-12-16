<?php

// Custom Exception class
class FileUploadException extends Exception {}

try {
    // Check if file is uploaded
    if (!isset($_FILES['myfile'])) {
        throw new FileUploadException("No file was uploaded.");
    }

    $file = $_FILES['myfile'];

    // Check for upload errors
    if ($file['error'] !== 0) {
        throw new FileUploadException("Error while uploading the file.");
    }

    // File size limit (2MB)
    if ($file['size'] > 2 * 1024 * 1024) {
        throw new FileUploadException("File size must be less than 2MB.");
    }

    // Allowed file types
    $allowedTypes = ['image/jpeg', 'image/png'];
    if (!in_array($file['type'], $allowedTypes)) {
        throw new FileUploadException("Only JPG and PNG files are allowed.");
    }

    // Upload folder
    $uploadDir = "uploads/";

    // Create folder if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }

    $filePath = $uploadDir . basename($file['name']);

    // Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $filePath)) {
        throw new FileUploadException("Failed to move uploaded file.");
    }

    echo "File uploaded successfully!";

} catch (FileUploadException $e) {
    echo "Upload Error: " . $e->getMessage();

} finally {
    echo "<br>File upload process completed.";
}

?>
