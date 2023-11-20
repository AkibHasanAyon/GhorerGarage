<?php
 session_start();
 require_once 'db_connection.php';
 $sql= "SELECT * FROM products";
 $all_product= $connection->query($sql);
 if(isset($_POST['add_to_cart'])){
    $product_username = $_SESSION['username'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
        echo '<script type="text/javascript">';
        echo 'alert("Already added!");';
        echo 'window.location.href= "buy_parts.php"';
        echo '</script>';
    }else{
       $insert_product = mysqli_query($connection, "INSERT INTO `cart`(user,name, price, image, quantity) VALUES('$product_username','$product_name', '$product_price', '$product_image', '$product_quantity')");
       echo '<script type="text/javascript">';
       echo 'alert("Added successfully");';
       echo 'window.location.href= "buy_parts.php"';
       echo '</script>';
    }
 
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ghorer Garage</title>

        <!-- custom css link -->
        <link rel="stylesheet" type="text/css" href="./bp.css">
        <script src="script.js" defer></script>
        <script src="https://unpkg.com/phosphor-icons"></script>
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- header start -->
    <header>
        
        <a href="/ghorergarage/user_front_page.php" class="logo"><img src="img/Picture1.png" width="270" height="60"> </a>
       <br>

        
        <nav>
        <div class="icons">
             <div class="search">
             
            <form action="result.php" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search product">
                    <button type="submit" class="cartbox">Search</button>
                    <?php
      $session_username = $_SESSION['username'];
      $select_rows = mysqli_query($connection, "SELECT * FROM `cart` WHERE user = '$session_username'") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
       
      
            
             <a href="cart.php" class="cartbox">My cart (<span><?php echo $row_count; ?></span>)</a>
                </div>
                
            </form>
            </div>
             
            
            
        </div>
    </nav>
    <style>
       
        .cartbox{
            display: auto;
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
    </header>
    
    <!-- Shop start -->
    <section class="shop" id="shop">
        
        <div class="container">
        <?php
      
      $select_products = mysqli_query($connection, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="../uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <h5>Price: <?php echo $fetch_product['price']; ?>/-</h5>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="button-12" value="Add to cart" name="add_to_cart"><!-- HTML !-->
            

<style>
.button-12 {
  display: auto;
  flex-direction: column;
  align-items: center;
  padding: 6px 14px;
  font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
  border-radius: 6px;
  border: none;

  background: black;
  box-shadow: 0px 0.5px 1px rgba(0, 0, 0, 0.1), inset 0px 0.5px 0.5px rgba(255, 255, 255, 0.5), 0px 0px 0px 0.5px rgba(0, 0, 0, 0.12);
  color: #DFDEDF;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-12:focus {
  box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1px rgba(0, 0, 0, 0.1), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
  outline: 0;
}
</style>
         </div>
      </form>

      <?php
         }}?> 
        </div>
         

    </section>
    <!-- about -->
    <section class="about" id="about">
        <div class="about-content">
            <h2>About</h2>
            <p>fewwwwwwwwwwwwwwwwwww
                fewwwwwwwwwwwwwwwwwwwfew
                fewwwwwwwwwwwwwwwwwfewww
                fewewewewewewewewewewewewewew
            </p>
        </div>
    </section>
    <!-- contact starter -->
    <section class="contact" id="contact">
        <div class="main-contact">
            <div class="contact-content">
            <li><a href="#Home">Home</a></li>
          
            </div>
            <div class="contact-content">
                <li><a href="#">Store Policy</a></li>
                <li><a href="#">Payment Methods</a></li>
            </div>

            <div class="contact-content">
                <li><a href="#">Contact</a></li>
                <li><a href="#">Tele: 01746-585025</a></li>
            </div>

            
         </div>
         
    </section>
</head>
</html>