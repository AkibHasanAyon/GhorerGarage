<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "ghorergarage"; 


$connection = mysqli_connect($servername, $username, $password, $dbname);


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./st.css">

	<title>Ghorergarage</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../logooo.png" weight="50" height="50">
			<span class="text">Ghorergarage</span>
		</a>
		<ul class="side-menu top">
			<li class="">
				<a href="./admin_front.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="./item.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Item List</span>
				</a>
			</li>
			<li >
				<a href="./order.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Order List</span>
				</a>
			</li>
			<li>
				<a href="bookinglist.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Booking List</span>
				</a>
			</li>
			<li class="active">
				<a href="mechanic.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Mechanics</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="../logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Mechanic List</h1>
					<ul class="breadcrumb">
						<li>
							<a href="./admin_front.php">Booking List</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				
			</div>

			


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Mechanic List</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<?php

$select = mysqli_query($connection, "SELECT * FROM `users` WHERE role='mechanic'");


?>
<div class="product-display">
   <table class="product-display-table">
	  
	  <tr>
		 <th>User</th>
		 <th>First Name</th>
         <th>Last Name</th>
         <th>Phone number</th>
         <th>Email</th>
		 <th>Address</th>
		 
	  </tr>
	  
	  <?php while($row = mysqli_fetch_assoc($select)){ ?>
		
		<style>
			.product-display-table{
				padding-bottom: 12px;
    			font-size: 13px;
    			text-align: center;
			}
		</style>
	  <tr>
        <td><?php echo $row['username']; ?></td>
		 <td><?php echo $row['first_name']; ?></td>
         <td><?php echo $row['last_name']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['address']; ?></td>
		
	  </tr>
   <?php } ?>
   </table>
</div>

				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="./sc.js"></script>
</body>
</html>