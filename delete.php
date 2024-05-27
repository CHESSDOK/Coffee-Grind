<?php
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'reserve');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the payment proof file path
    $stmt = $conn->prepare("SELECT payment_proof FROM orders WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filePath = $row['payment_proof'];

        // Delete the order from the database
        $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        // Delete the file from the server
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        echo "<script>alert('Order and payment proof have been deleted.'); window.location.href = 'contact.php';</script>";
    } else {
        echo "Order not found.";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "No order ID provided.";
}
?>
