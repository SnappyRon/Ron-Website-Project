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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminstyle.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="dashboard">
        <nav class="navigation">
            <a href="admin.php">Home</a>
            <a href="customerinfo.php">Customer Information</a>
            <a href="rentalinfo.php">Rental Information</a>
            <a href="caravailable.php">Car Inventory</a>
            <a href="admin.php?logout=true">Logout</a> 
        </nav>
        <div class="content">
            <div class="title a">Admin Dashboard</div>
            <p>Welcome to the Admin Dashboard! Select an option from the navigation.</p>
        </div>
    </div>
</body>
</html>
