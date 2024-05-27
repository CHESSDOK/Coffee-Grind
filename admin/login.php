<?php
    session_start();

    $error='';

    if(isset($_POST['login']))
    {
        if(empty($_POST['username']) || empty($_POST['password'])){
    $error="Username or Password is Invalid";
    }
    else
    {

    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your username
    $password = ""; // Replace with your password
    $dbname = "reserve"; // Replace with your database name
    $conn = mysqli_connect($servername, $username, $password, $dbname);


    $username=$_POST['username'];
    $password=$_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE password='$password' AND username='$username'");
    $rows = mysqli_num_rows($query);

    if($rows==1){
    $_SESSION['username']= $username;
    $_SESSION['password']= $password;
    header('Location:index.php');
    }

    else {
        echo "<script>alert('Invalid username and password, try again.')</script>";
    }
    mysqli_close($conn);
    }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
    <style type="text/css">
    body {
      overflow:hidden;
      background-image: url('pics/BG1.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      align-content: center;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    .form-container {
      margin-top: 10vh;
      margin-left: 40%;
      padding: 20px;
      width: 28vw;
      flex-grow: 1;
      position: absolute;
    }


    h2 {
      text-align: center;
      color: #DA9F5B;
      font-size: 45px;
      margin-left: 50px ;
      margin-bottom: 65px;
      margin-top: -30px;
      text-shadow: 0 0 3px #333, 0 0 5px #333;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 2px;
      color: black;
    }
    input[type="text"], input[type="password"] {
      padding: 15px;
      font-size: 28px;
      margin-left: 1%;
      width: 25vw;
      border-radius: 8px;
      border: none;
      margin-bottom: 50px;
      box-shadow: 0px 0px 5px 0px #ccc;
    }
    button[type="submit"] {
      font-size: 20px;
      background-color: #33211D;
      color: #fff;
      padding: 10px;
      border: 2px solid #695d99;
      border-radius: 15px;
      margin-left: 1%;
      margin-top: -30px;
      cursor: pointer;
      width: 8vw;
    }
    button[type="submit"]:hover {
      background-color: #444;
    }
    button[type="submit"] {
      box-shadow: -4px 4px 8px rgba(0,0,0,0.4);
    }
    .error {
    color: red;
    font-size: 12px;
    margin-left: 130px;
    }
    .error {
      visibility: hidden;
      color: red;
      font-size: 12px;
      margin-left: 130px;
    }

    .error.show {
      visibility: visible;
    }

  </style>
</head>
<body>
 <div class="container">

      <div class="form-container">

      <h2>WELCOME</h2>
          <form action="login.php" method="post">
            <input type="text" autocomplete="off" placeholder="username" name="username" required>
            <input type="password" autocomplete="off" placeholder="password" name="password" required>
            <br>
            <button type="submit" name="login"> Login </button>
      </form>

</body>
</html>