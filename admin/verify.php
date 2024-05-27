<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Path to PHPMailer autoloader

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];

    // Retrieve order details
    $conn = new mysqli('localhost', 'root', '', 'reserve');
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    // Update order status to 'Verified'
    $stmt = $conn->prepare("UPDATE orders SET status = 'Verified' WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    $email = $order['email'];
    $product_id = $order['product_id'];
    $quantity = $order['quantity'];
    $total_price = $order['total_price'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'marklawrencemercado8@gmail.com'; // Your Gmail email address
        $mail->Password = 'svvj rfpf egbx qbvo'; // Your Gmail app-specific password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('marklawrencemercado8@gmail.com', 'Coffee Grind');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Order Verification';
        $mail->Body = "Hi customers,<br><br>Your order with the following details has been verified:<br>
                       Product ID: $product_id<br>
                       Quantity: $quantity<br>
                       Total Price: $total_price<br><br>
                       Thank you for ordering.";

        $mail->send();
        
        echo "<script>alert('Order ID $order_id has been verified.'); window.location.href = 'admin.php';</script>";
    } catch (Exception $e) {
        echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
    }
}
?>