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

$query = "SELECT car_id, car_type, make, carModel, yearModel, color FROM cars";
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
    <title>Customer Information</title>
    <link rel="stylesheet" href="adminstyle.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="dashboard">
        <nav class="navigation">
            <a href="admin.php">Home</a>
            <a href="customerinfo.php">Customer Information</a>
            <a href="rentalinfo.php">Rental Information</a>
            <a href="caravailable.php">Car Inventory</a>
            <a href="customerinfo.php?logout=true">Logout</a>
        </nav>
        <div class="content">
            <div class="title b">Car Inventory</div>
            <table class="customer-table">
                <caption>Available Cars</caption>
                <thead>
                    <tr>
                        <th>car_id</th>
                        <th>car_type</th>
                        <th>make</th>
                        <th>carModel</th>
                        <th>yearModel</th>
                        <th>color</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>". $row['car_id']. "</td>";
                        echo "<td>". $row['car_type']. "</td>";
                        echo "<td>". $row['make']. "</td>";
                        echo "<td>". $row['carModel']. "</td>";
                        echo "<td>". $row['yearModel']. "</td>";
                        echo "<td>". $row['color']. "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
