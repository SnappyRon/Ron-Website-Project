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

$query = "SELECT customer_id, firstName, middleName, lastName, phoneNumber, emailAddress, address, licenseID FROM customer";
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
            <div class="title b">Customer Information</div>
            <table class="customer-table">
                <caption>Customer's Data</caption>
                <thead>
                    <tr>
                        <th>customer_id</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Address</th>
                        <th>License ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>". $row['customer_id']. "</td>";
                        echo "<td>". $row['firstName']. "</td>";
                        echo "<td>". $row['middleName']. "</td>";
                        echo "<td>". $row['lastName']. "</td>";
                        echo "<td>". $row['phoneNumber']. "</td>";
                        echo "<td>". $row['emailAddress']. "</td>";
                        echo "<td>". $row['address']. "</td>";
                        echo "<td>". $row['licenseID']. "</td>";
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
