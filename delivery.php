<?php
session_start();
include_once 'db_connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$session_username = mysqli_real_escape_string($connection, $_SESSION['username']); 

$select_user = mysqli_query($connection, "SELECT * FROM `order` WHERE `user` = '$session_username'");
$select_appointment= mysqli_query($connection, "SELECT * FROM `appointment`WHERE `username` = '$session_username'");
if (!$select_user) {
    die("Query failed: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Delivery Status</title>
    <!-- Add your CSS styles or link to an external stylesheet here if needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .product-display {
            margin: 20px;
        }

        .product-display-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .product-display-table th, .product-display-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .product-display-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<div class="product-display">
    
    <table class="product-display-table">
        <tr>
          
            <th>Delivery Status</th>
            <th>Booking Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($select_user)) { ?>
        
            <td>
                <?php
                $deliveryStatus = $row['status'];
                switch ($deliveryStatus) {
                    case 'pending':
                        echo 'Pending';
                        break;
                    case 'approved':
                        echo 'Approved';
                        break;
                    case 'denied':
                        echo 'Denied';
                        break;
                    default:
                        echo 'Unknown';
                        break;
                }
                ?>
            </td>
            
        <?php } ?>
        <?php while ($row = mysqli_fetch_assoc($select_appointment)) { ?>
        <td>
                    <?php
                    if ($row['status'] == 'pending') {
                        echo 'Pending';
                    } elseif ($row['status'] == 'approved') {
                        echo 'Approved';
                    } elseif ($row['status'] == 'denied') {
                        echo 'Denied';
                    }
                    ?>
                </td>
                <?php } ?>
    </table>
            </div>
            <div class="center-container">
<form action="user_front_page.php" method="POST">
  <button class='button1'>Return</button>
</form>
</div>
<style>
    
    .center-container {
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;
}
    .button1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 6px 14px;
    font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
    border-radius: 50px;
    border: none;
    background: black;
    box-shadow: 0px 0.5px 1px rgba(0, 0, 0, 0.1), inset 0px 0.5px 0.5px rgba(255, 255, 255, 0.5), 0px 0px 0px 0.5px rgba(0, 0, 0, 0.12);
    color: #DFDEDF;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}

</style>