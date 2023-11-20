<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "ghorergarage"; 


$connection = mysqli_connect($servername, $username, $password, $dbname);


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}





if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_SESSION['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $address = $_POST['address'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO appointment (username, name, email, phone_number, date, time, address, problem)
            VALUES ('$username','$name', '$email', '$phone_number', '$date', '$time', '$address', '$problem')";

    if ($connection->query($sql) === TRUE) {
		echo '<script type="text/javascript">';
			echo 'alert("Record added successfully");';
			echo 'window.location.href= "booking.php"';
			echo '</script>';
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$connection->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking</title>
	<link rel="stylesheet" href="css/booking.css">
	
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,900" rel="stylesheet">
</head>
<body>
	<header>
		<div class="topnav">
            <a href="../user_front_page.php" class="logo"><img src="../logo.png" width="150" height="35" alt=""></a>
            <a href="../user_front_page.php">Home</a>
            <a href="../delivery.php">Delivery</a>
            <a href="/ghorergarage/booking/booking.php">Booking service</a>
            <a href="../admin/buy_parts/cart.php">Cart</a>
            <a href="/ghorergarage/viewprofile.php">View profile</a>
            <a href="/ghorergarage/homepage.html">Logout</a>
          </div>
	</header>
<div class="wrapper">


	<div class="container">

		<div class="container-form">
		<form action="booking.php" method="POST">

					<h2 class="heading heading-Black">Book An Appoinment</h2>

					<div class="form-field">
						<p>Your Name</p>
						<input type="text" name="name" placeholder="Your Name">
					</div>
					<div class="form-field">
						<p>Your email</p>
						<input type="email" name="email" placeholder="Your email">
					</div>
					<div class="form-field">
						<p>Phone number</p>
						<input type="number" name="phone_number" placeholder="Your number ">
					</div>
					<div class="form-field">
						<p>Date</p>
						<input type="date" name="date">
					</div>
					<div class="form-field">
						<p>Time</p>
						<input type="time" name="time">
					</div>
					<div class="form-field">
						<p>Address</p>
						<input type="text" name="address" placeholder="   ">
					</div>
					<div class="form-field">
						<p>Description of problem</p>
						<input type="text" name="problem" placeholder="   ">
					</div>
					<button class="btn">Set current location</button>
					<!-- show -->
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
		</div>
	</div>
</div>	
	
</body>

</html>