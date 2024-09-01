<?php

session_start(); 

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit(); 
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$database = "carrentalsystem";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

$query = "SELECT rental_id, customer_id, car, startDate, returnDate, total_cost, car_id FROM rentals";
$result = mysqli_query($conn, $query);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Information</title>
    <link rel="stylesheet" href="adminstyle.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="dashboard">
        <nav class="navigation">
            <a href="admin.php">Home</a>
            <a href="customerinfo.php">Customer Information</a>
            <a href="rentalinfo.php">Rental Information</a>
            <a href="caravailable.php">Car Inventory</a>
            <a href="rentalinfo.php?logout=true">Logout</a>
        </nav>
        <div class="content">
            <div class="title b">Rental Information</div>
            <table class="customer-table">
                <caption>Rental Data</caption>
                <thead>
                    <tr>
                        <th>rental_id</th>
                        <th>customer_id</th>
                        <th>car</th>
                        <th>startDate</th>
                        <th>returnDate</th>
                        <th>total_cost</th>
                        <th>car_id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result))  {
                        echo "<tr>";
                        echo "<td>". $row['rental_id']. "</td>";
                        echo "<td>". $row['customer_id']. "</td>";
                        echo "<td>". $row['car']. "</td>";
                        echo "<td>". $row['startDate']. "</td>";
                        echo "<td>". $row['returnDate']. "</td>";
                        echo "<td>". $row['total_cost']. "</td>";
                        echo "<td>". $row['car_id']. "</td>";
                        echo "</tr>";
                    }    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
