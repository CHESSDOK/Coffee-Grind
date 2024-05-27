<?php
$servername = "localhost;
$username = "root";
$password = "";
$dbname = "reserve";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO emails (email) VALUES ('$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Email inserted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid email format!";
    }
}

$conn->close();
?>
