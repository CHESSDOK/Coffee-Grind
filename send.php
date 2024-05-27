<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "reserve"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $CP = mysqli_real_escape_string($conn, $_POST['CP']); 
    $com = mysqli_real_escape_string($conn, $_POST['com']);

    // Attempt insert query execution
    $sql = "INSERT INTO cont (name, email, CP, com) VALUES ('$name', '$email', '$CP', '$com')";
    if ($conn->query($sql) === true) {
        header('Location: contact.html');
    } else {
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
    
    // Close connection
    $conn->close();
}

?>
