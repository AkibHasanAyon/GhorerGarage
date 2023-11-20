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
			<li class="active">
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
			<li>
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
					<h1>Order List</h1>
					<ul class="breadcrumb">
						<li>
							<a href="./admin_front.php">Order List</a>
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
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<?php

$select = mysqli_query($connection, "SELECT * FROM `order`");


?>
<div class="product-display">
   <table class="product-display-table">
	  
	  <tr>
		 <th>User</th>
		 <th>Phone</th>
		 <th>Address</th>
		 <th>City</th>
		 <th>Zip</th>
		 <th>Products name</th>
		 <th>Products price</th>
		 <th>Delivery Status</th>
		 
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
		
		 <td><?php echo $row['name']; ?></td>
		 <td><?php echo $row['number']; ?></td>
		 <td><?php echo $row['flat']; ?></td>
		 <td><?php echo $row['city']; ?></td>
		 <td><?php echo $row['pin_code']; ?></td>
		 <td><?php echo $row['total_products']; ?></td>
		 <td><?php echo $row['total_price']; ?></td>
		<td>
			<form action="order.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
				<input type="submit" name="approve" value="Approve"/>
				<input type="submit" name="deny" value="Deny"/>
			</form>
		</td>
	  </tr>
   <?php } ?>
   </table>
</div>
<?php
	if (isset($_POST['approve'])) {
		$id = $_POST['id'];
		$updateQuery = "UPDATE `order` SET `status`='approved' WHERE `id`='$id'";
		$result = mysqli_query($connection, $updateQuery);
	
		if ($result) {
			echo '<script type="text/javascript">';
			echo 'alert("Order Approved!");';
			echo 'window.location.href= "order.php"';
			echo '</script>';
		} else {
			echo 'Error updating order status: ' . mysqli_error($connection);
		}
	}
	
	if (isset($_POST['deny'])) {
		$id = $_POST['id'];
		$updateQuery = "UPDATE `order` SET `status`='denied' WHERE `id`='$id'";
		$result = mysqli_query($connection, $updateQuery);
	
		if ($result) {
			echo '<script type="text/javascript">';
			echo 'alert("Order Denied!");';
			echo 'window.location.href= "order.php"';
			echo '</script>';
		} else {
			echo 'Error updating order status: ' . mysqli_error($connection);
		}
	}
	
?>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="./sc.js"></script>
</body>
</html>