<?php

?>
<header class="header">

   <div class="flex">

      <a href="/ghorergarage/user_front_page.php" class="logo"><img src="/ghorergarage/logo.png" width="230" height="50"></a>

      <nav class="navbar">
         <a href="./buy_parts.php">view products</a>
      </nav>

      <?php
      $session_username = $_SESSION['username'];
      $select_rows = mysqli_query($connection, "SELECT * FROM `cart` WHERE user = '$session_username'") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>