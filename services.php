<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Services - Techmovee</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="icon" type="images/png" href="images/Techmovelogo.png">
	<!-- <style>
        /* Styling for car options fieldset */
        .car-options fieldset {
            border: none;
            border-radius: 10px;
            padding: 20px;
            background-color: #2CB8C7;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .car-options fieldset legend {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .car-options label {
            display: inline-block;
            margin: 10px;
            padding: 15px;
            border-radius: 10px;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
            background-color: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .car-options input[type="radio"] {
            display: none;
        }

        .car-options input[type="radio"]:checked + label {
            background-color: #fff;
            color: #2CB8C7;
            transform: translateY(-5px);
        }

        .car-options label:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style> -->
</head>
<body>
	<div id="header">
		<div class="section">
			<div class="logo">
				<a href="index.php"><img src="images/techmovelogo.png" alt="" width="270" height="130"></a>
			</div>
			<ul>
				<li>
					<a href="index.php">home</a>
				</li>
				<li>
					<a href="about.html">about</a>
				</li>
				<li class="selected">
					<a href="services.php">services</a>
				</li>
				<li>
					<a href="contact.html">contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<h2>Rent a Car Now!</h2>
		<form action="connectdb.php" method="post" id="booking-form">
			<div class="form-row">	
		    	<label>First Name:</label>
		    	<input placeholder="First Name" type="text" name="firstName" id="firstname" required>

		    	<label>Middle Name:</label>
		    	<input placeholder="Last Name" type="text" name="middleName" id="middlename" required>

		    	<label>Last Name:</label>
		    	<input placeholder="Middle Name" type="text" name="lastName" id="lastname" required>
			</div>	

			<div class="form-row">
		    	<label>Email Address:</label>
		    	<input placeholder="Email address" type="text" name="emailAddress" id="emailAddress" required>

		    	 <label>Phone Number:</label>
		    	<input placeholder="Phone Number" type="text" name="phoneNumber" id="phoneNumber" required>
			</div>	

			<div class="form-row">
		    	<label>License ID*:</label>
		    	<input placeholder="License ID No." type="text" name="licenseID" id="licenseID" required>

		    	<label >Address:</label>
		    	<input placeholder="615 Magnolia Blvd." type="text" name="address" id="Address" required>
			</div>	

			<div class="form-row">
		    	<label for="startDate">Start Rent Date:</label>
		    	<input type="date" name="startDate" id="start-date" required>

		    	<label for="returnDate">Return Date:</label>
		    	<input type="date" name="returnDate" id="return-date" required>
			</div>	

			<div class="car-options">
				<fieldset>
					<legend><p>Select a Car:</p></legend>	
						<input type="radio" name="car" value="suv" id="suv" checked> 
						<label>Toyota Fortuner</label>
						
						<input type="radio" name="car" value="pickup" id="Pick-Up"> 
						<label>Nissan Navarra</label>
						
						<input type="radio" name="car" value="van" id="van"> 
						<label>Nissan NV350</label>
						
						<input type="radio" name="car" value="sedan" id="sedan">
						<label>Toyota Vios</label>

						<input type="radio" name="car" value="buv" id="buv">
						<label>Mitsubishi Expander GLS</label>
				</fieldset>	
			</div>	

			<br>
		    <button type="submit" name="save" value="Submit">Book Now!</button>
		</form><br>
		<h3>CARS</h3>
		<ul>
			<li>
				<a href="#"><img src="images/sample car 1.png" alt="" width="210" height="170"></a>
			</li>
			<li>
				<a href="#"><img src="images/sample car 2.png" alt="" width="210" height="170"></a>
			</li>
			<li>
				<a href="#"><img src="images/sample car 3.png" alt="" width="210" height="170"></a>
			</li>
			<li>
				<a href="#"><img src="images/sample car 4.png" alt="" width="210" height="170"></a>
			</li>
			<li>
				<a href="#"><img src="images/sample car 5.png" alt="" width="210" height="170"></a>
		</ul>
		<a href="#" class="more">show more</a>
	</div>
	<div id="footer">
		<div>
			<div class="connect">
				<a href="http://twitter.com" id="twitter">twitter</a>
				<a href="https://www.facebook.com" id="facebook">facebook</a>
				<a href="http://google.com" id="googleplus">googleplus</a>
				<a href="http://pinterest.com" id="pinterest">pinterest</a>
			</div>
			<p>
				&copy; copyright 2023 | all rights reserved.
			</p>
		</div>
	</div>
	<script src="javascript/script.js"></script>
</body>
</html>