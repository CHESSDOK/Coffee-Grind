<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1, h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        .qr-code {
            max-width: 200px;
            margin: 20px auto;
        }
        .upload-form {
            margin-top: 20px;
        }
        .upload-form label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        .upload-form input[type="file"] {
            margin-bottom: 20px;
        }
        .upload-form button {
            background-color: #28a745;
            margin-right: 20px;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .upload-form button:hover {
            background-color: #218838;
        }
        a {
            text-decoration: none;
            color: white;
        }
        .cancel-button {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product'];
    $quantity = $_POST['quantity'];
    $email = $_POST['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'reserve');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch product price
    $result = $conn->query("SELECT price FROM products WHERE id = $product_id");
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $total_price = $product['price'] * $quantity;

        // Insert order into database
        $stmt = $conn->prepare("INSERT INTO orders (product_id, quantity, total_price, email) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("iids", $product_id, $quantity, $total_price, $email);
            $stmt->execute();

            // Get the inserted order ID
            $order_id = $stmt->insert_id;

            // Display payment instructions with GCash QR code
            echo "<div class='container'>";
            echo "<h1>Order Summary</h1>";
            echo "<p>Product ID: $product_id</p>";
            echo "<p>Quantity: $quantity</p>";
            echo "<p>Total Price: $total_price</p>";
            echo "<h2>Payment via GCash</h2>";
            echo "<p>Scan the QR code below to make a payment:</p>";
            echo "<img src='images/gc.png' alt='GCash QR Code' class='qr-code'><br>";
            echo "<form action='upload_proof.php' method='post' enctype='multipart/form-data' class='upload-form'>";
            echo "<input type='hidden' name='order_id' value='$order_id'>";
            echo "<label for='proof'>Upload Payment Proof:</label>";
            echo "<input type='file' name='proof' id='proof' required><br><br>";
            echo "<button type='submit'>Submit</button>";
            echo "<button class='cancel-button'><a href='delete.php?id=$order_id'>Cancel</a></button>";
            echo "</form>";
            echo "</div>";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Product not found.";
    }
    $conn->close();
}
?>
</body>
</html>
