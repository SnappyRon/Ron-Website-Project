<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "carrentalsystem";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($password == $row['password']) { 
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['usertype'];
                header('Location: admin.php');
                exit();
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Username not found";
        }
        $stmt->close();
    } else {
        echo "Please enter both username and password";
    }

} else {
    echo '<form action="login.php" method="post">
    <header>
      <h2>Welcome to the Car Rental System Admin Panel</h2>
    </header>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
    </div>
    <div class="form-group">    
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
    </div>    
        <input type="submit" value="Login">
    </form>';
}
?>

<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

header {
  background: linear-gradient(135deg, #007bff, #00bfff); /* Gradient background */
  color: #fff;
  padding: 20px;
  text-align: center;
  border-radius: 10px 10px 0 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Adding a subtle shadow */
  max-width: 1000px; /* Limiting the width of the header */
  margin: 0 auto; /* Centering the header horizontally */
}

form {
  width: 100%;
  max-width: 400px;
  margin: 50px auto;
  background-color: #fff;
  border-radius: 0 0 10px 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

.form-group {
  margin-bottom: 30px;
}

.form-group label {
  font-size: 16px;
  color: #333;
  display: block;
  margin-bottom: 8px;
}

.form-group input {
  font-size: 16px;
  padding: 10px;
  width: calc(100% - 20px);
  border: 1px solid #ccc;
  border-radius: 5px;
  transition: border-color 0.3s;
}

.form-group input:focus {
  outline: none;
  border-color: #007bff; /* Commercial blue color */
}

input[type="submit"] {
  font-size: 16px;
  padding: 10px 20px;
  background-color: #007bff; /* Commercial blue color */
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 20px;
  transition: background-color 0.3s;
}

input[type="submit"]:hover {
  background-color: #0056b3; /* Darker shade of commercial blue color */
}

/* Adjustments for uniformity with header */
form {
  border-top: 5px solid #007bff; /* Match header background color */
}

input[type="submit"] {
  background-color: #007bff; /* Match header background color */
}

input[type="submit"]:hover {
  background-color: #0056b3; /* Darker shade of header background color */
}

</style>
