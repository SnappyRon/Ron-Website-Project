<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "carrentalsystem";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

if(isset($_POST['save'])) {
    
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $emailAddress = $_POST['emailAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $licenseID = $_POST['licenseID'];
    $address = $_POST['address']; 
    $carType = $_POST['car']; 
    $startDate = $_POST['startDate']; 
    $returnDate = $_POST['returnDate']; 


    $car_id_query = "SELECT car_id FROM cars WHERE car_type = ?";
    $stmt = mysqli_prepare($conn, $car_id_query);
    mysqli_stmt_bind_param($stmt, "s", $carType);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $car_id);
        mysqli_stmt_fetch($stmt);
    } else {
        echo "Error: Car ID not found for selected car type.";
        exit;
    }

    mysqli_stmt_close($stmt);


    $car_rates = array(
        "suv" => 2500,
        "pickup" => 4000,
        "sedan" => 1200,
        "van" => 5000,
        "buv" => 5000
    );

    
    if(array_key_exists($carType, $car_rates)) {
        $rate_per_day = $car_rates[$carType];
        
        
        $start = strtotime($startDate);
        $end = strtotime($returnDate);
        $days_rented = ceil(abs($end - $start) / 86400); 
        $total_cost = $rate_per_day * $days_rented;
        
        
        $customer_sql_query = "INSERT INTO customer (firstName, middleName, lastName, emailAddress, phoneNumber, licenseID, address) 
        VALUES ('$firstName', '$middleName', '$lastName', '$emailAddress', '$phoneNumber', '$licenseID', '$address')";

        if (mysqli_query($conn, $customer_sql_query)) {
            
            $customer_id = mysqli_insert_id($conn);
            
            
            $rental_sql_query = "INSERT INTO rentals (customer_id, car, startDate, returnDate, total_cost, car_id) 
            VALUES ('$customer_id', '$carType', '$startDate', '$returnDate', '$total_cost','$car_id')";
            
            if (mysqli_query($conn, $rental_sql_query)) {
                echo "<script>alert('Your rental has been successfully submitted!');</script>";
                header("Refresh: 2; url=index.php");
            } else {
                echo "Error: ". $rental_sql_query. "<br>". mysqli_error($conn);
            }
        } else {
            echo "Error: ". $customer_sql_query. "<br>". mysqli_error($conn);
        }
    } else {
        echo "Error: Invalid car type. Please select a valid car type.";
    }

    
    mysqli_close($conn);
}

