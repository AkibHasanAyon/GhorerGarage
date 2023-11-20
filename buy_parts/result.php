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
<?php



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ghorer Garage</title>

        <!-- custom css link -->
        <link rel="stylesheet" type="text/css" href="./bpp.css">
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
       

        
        <nav>
        <div class="icons">
             <div class="search">
             
            <form action="result.php" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search product">
                    <button type="submit" class="cartbox">Search</button>
                    <?php
      
      $select_rows = mysqli_query($connection, "SELECT * FROM `cart`") or die('query failed');
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
            text-decoration: none;
            border: 1px solid black;
            padding: 50px 10px;
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
    <section class="shop" id="shop">
<div class="container">

<link rel="stylesheet" type="text/css" href="./bp.css">
<tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","ghorergarage");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM products WHERE CONCAT(name,image,price) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                               <?php
      
                                                $select_products = mysqli_query($connection, "SELECT * FROM `products`");
                                                ?>
                                                <form action="" method="post">
                                                <div class="box">
                                                <tr>
                                                <img src="../uploaded_img/<?php echo $items['image']; ?>" alt="">
                                                <h3><?php echo $items['name']; ?></h3>
                                                <h5>Price: <?php echo $items['price']; ?>/-</h5>
                                                <input type="hidden" name="product_name" value="<?php echo $items['name']; ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $items['price']; ?>">
                                                <input type="hidden" name="product_image" value="<?php echo $items['image']; ?>">
                                                <input type="submit" class="button-12" value="Add to cart" name="add_to_cart">
                                                </tr>
                                                
                                                </div>
                                                </form>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                
                                                <div class="demo-preview ">

  <div class="alert alert-danger alert-dismissable fade in">
  <h2><data-dismiss="alert" aria-label="close" class="close"><span aria-hidden="true"></span> No Result Found!</h2></div>
  <form action="./buy_parts.php" method="POST">
  
<button class="button-80" role="button">Return</button></div>
<style>


/* CSS */
.button-80 {
  background: #fff;
  backface-visibility: hidden;
  border-radius: .375rem;
  border-style: solid;
  border-width: .125rem;
  box-sizing: border-box;
  color: #212121;
  cursor: pointer;
  display: inline-block;
  font-family: Circular,Helvetica,sans-serif;
  font-size: 1.125rem;
  font-weight: 700;
  letter-spacing: -.01em;
  line-height: 1.3;
  padding: .875rem 1.125rem;
  position: relative;
  text-align: left;
  text-decoration: none;
  transform: translateZ(0) scale(1);
  transition: transform .2s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-80:not(:disabled):hover {
  transform: scale(1.05);
}

.button-80:not(:disabled):hover:active {
  transform: scale(1.05) translateY(.125rem);
}

.button-80:focus {
  outline: 0 solid transparent;
}

.button-80:focus:before {
  content: "";
  left: calc(-1*.375rem);
  pointer-events: none;
  position: absolute;
  top: calc(-1*.375rem);
  transition: border-radius;
  user-select: none;
}

.button-80:focus:not(:focus-visible) {
  outline: 0 solid transparent;
}

.button-80:focus:not(:focus-visible):before {
  border-width: 0;
}

.button-80:not(:disabled):active {
  transform: translateY(.125rem);
}
    .demo-preview {
  padding-top: 200px;
  padding-bottom: 10px;
  margin: auto;
  text-align: center;
}

.alert {
  padding: .7143rem 0.071rem;
  margin-bottom: 1.429rem;
  border-radius: 2px;
  border: 1px solid transparent;
  color: #FFF
}

.alert.alert-danger {
  background-color: #ef1c1c;
  border-color: #EF5350
}
</style>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
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

    </section>
    </head>
</html>