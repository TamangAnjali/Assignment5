
<?php
require_once "fileuploadexception.php";

try {
    // Check if file is uploaded
    if (!isset($_FILES["file"])) {
        throw new FileUploadException("No file was uploaded.");
    }

    $file = $_FILES["file"];

    // Check for upload errors
    if ($file["error"] !== 0) {
        throw new FileUploadException("Upload failed with error code: " . $file["error"]);
    }

    // Validate size (max 2MB)
    if ($file["size"] > 2 * 1024 * 1024) {
        throw new FileUploadException("File size cannot exceed 2 MB.");
    }

    // Validate file type (only images allowed)
    $allowed = ["image/png", "image/jpeg", "image/jpg"];
    if (!in_array($file["type"], $allowed)) {
        throw new FileUploadException("Only PNG and JPG images are allowed.");
    }

    // Move uploaded file
    $target = "uploads/" . basename($file["name"]);
    if (!move_uploaded_file($file["tmp_name"], $target)) {
        throw new FileUploadException("Failed to move uploaded file.");
    }

    echo "<p>File uploaded successfully!</p>";

} catch (FileUploadException $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";

} finally {
    echo "<p>Upload attempt completed.</p>";
}
?>
