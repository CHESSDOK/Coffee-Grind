<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["proof"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an image
    $check = getimagesize($_FILES["proof"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["proof"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file)) {
            // Update database with file path
            $conn = new mysqli('localhost', 'root', '', 'reserve');
            $stmt = $conn->prepare("UPDATE orders SET payment_proof = ? WHERE id = ?");
            $stmt->bind_param("si", $target_file, $order_id);
            $stmt->execute();

            echo "<script>alert('Payment proof uploaded successfully.'); window.location.href = 'contact.php';</script>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
