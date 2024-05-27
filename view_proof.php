<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = "$file";

    if (file_exists($filePath)) {
        $mimeType = mime_content_type($filePath);
        header("Content-Type: $mimeType");
        readfile($filePath);
    } else {
        echo "File not found.";
    }
} else {
    echo "No file specified.";
}
?>
