<?php
session_start();
@include 'db_connection.php';

if(isset($_POST['order_btn'])){
   $username = $_SESSION['username'];
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $city = $_POST['city'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($connection, "SELECT * FROM `cart` WHERE user = '$username'");

   $price_total = 0;
   $product_name = array();
   if (mysqli_num_rows($cart_query) > 0) {
      while ($product_item = mysqli_fetch_assoc($cart_query)) {
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format (($product_item['price'] * $product_item['quantity']) , 2, '.', '' );
         $price_total =  $price_total + $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($connection, "INSERT INTO `order`(user, name, number, email, method, flat,  city, pin_code, total_products, total_price, status) VALUES('$username','$name','$number','$email','$method','$flat','$city','$pin_code','$total_product','$price_total','pending')") or die('query failed');

   if($cart_query && $detail_query){
   
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
        
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : ".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$city." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>

         </div>
            <a href='./buy_parts.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/cartstyle.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($connection, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format(($fetch_cart['price'] * $fetch_cart['quantity']), 2, '.', '' );
            $grand_total = $total += $total_price;
      ?>
      <span><img src="../uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""><br><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : <?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on devlivery</option>
               <option value="credit cart">Credit card</option>
               <option value="paypal">Bkash</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. dhaka" name="city" required>
         </div>
        
         
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>