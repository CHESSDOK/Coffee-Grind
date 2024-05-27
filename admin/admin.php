<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Admin Panel</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
</nav>
<div class="container">
<a href="index.php">CHECK RESERVE SEAT</a>
    <table class="table table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">email</th>
            <th scope="col">Product ID</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Status</th>
            <th scope="col">Payment Proof</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch orders from the database
        $conn = new mysqli('localhost', 'root', '', 'reserve');
        $result = $conn->query("SELECT * FROM orders");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['product_id']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>{$row['total_price']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td><a href='../view_proof.php?file={$row['payment_proof']}' target='_blank'>View Proof</a></td>";
            echo "<td>";
            if ($row['status'] == 'Pending') {
                echo "<form action='verify.php' method='post'>";
                echo "<input type='hidden' name='order_id' value='{$row['id']}'>";
                echo "<button class='btn btn-success' type='submit'>Verify</button>";
                echo "</form>";
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>
</div>
<script src="path/to/jquery.min.js"></script>
<script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>