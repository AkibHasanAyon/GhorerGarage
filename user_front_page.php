<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1">
        <title>Ghorer Garage</title>
        <link rel="stylesheet" type="text/css" href="style.css">

        <!---box icons--->
        <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!---google font--->

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    </head>
    <body>
<!---header--->
<header>
    <a href="#" class="logo"><img src="logooo.png">Ghorer Garage</a>
    <ul class="navlist">
        <li><a href="#home" class="active">Home</a></li>
        <li><a href="/ghorergarage/delivery.php">Delivery</a></li>
        <li><a href="booking/booking.php">Booking service</a></li>
        <li><a href="./admin/buy_parts/cart.php">Cart</a></li>
        <li><a href="/ghorergarage/viewprofile.php">View profile</a></li>
        <li><a href="#contact">Contact us</a></li>
        <li><a href="logout.php">Logout</a></li>

    </ul>
</header>
<!---home--->
<section class="home" id="home">
    <div class="home-img">
        <img src="img/beda.jpeg"width="750" height="750">
    </div>
    <div class="home-text">
    <h1>Hello, <span><?php echo $_SESSION['username'] ?></span></h1>
        <h1>Welcome to<span><br>Ghorer Garage</h1>
        
        <a href="admin/buy_parts/buy_parts.php" class="btn">Buy Parts<i class='bx bxs-right-arrow' ></i></a>
    </div>
   

</section>
<!---container--->
<section class="container">
    <div class="container-box">
        <img src="time.png" width="150" height="150">
        <h3>11.00am-8.00pm</h3>
        <a href="#">Working Hours</a>
    </div>

    <div class="container-box">
        <img src="location.png" width="130" height="150">
        <h3>Bashundhara R/A</h3>
        <a href="https://goo.gl/maps/YTgUWpxRhK3crnR76">Location</a>
    </div>

    <div class="container-box">
        <img src="call us.png" width="150" height="150">
        <h3>+880 1746-585025</h3>
        <a href="https://wa.link/bou8nu">Call Us Now</a>
    </div>
</section>
<!---about us--->
<section class="about" id="about">
    <div class="about-img">
        <img src="about.jpg"width="1000" height="650">
    </div>
    <div class="about-text">
       <h2>Buy parts and service <br> automobile from home.</h2>
       <p>When a person buy a new or used car, the first thing that comes to their mind is how they are going to maintain their car. Because most of the people in our country doesn’t have any proper knowledge about cars. 
        The problem about Bangladeshi car market is that the majority of the people prefers to buy reconditioned car rather than a brand new one from the authorized dealership due to high taxes and price. 
        Therefore most of the people doesn't get any warranty support from the dealership and have to depend on the third party workshop. The problem with these workshop is that they are full of scammers. That’s what people are mostly worried about when they buy a new car.
        Our target is to help those people to get rid of all those hassles.
       <a href="#" class="btn">Explore Story<i class='bx bxs-right-arrow' ></i></a>
    </div>
</section>
<!---our shop--->
<section class="shop" id="shop">
    <div class="middle-text">
        <h4>Our shop</h4>
        <h2>Let's check our popular products</h2>
    </div>

    <div class="shop-content">
        <div class="row">
            <img src="part1.png" width="300" height="300">
            <h3>1NZ-FE</h3>
            
            <div class="in-text">
                <div class="price">
                    <h6>152000tk</h6>
                </div>
                <div class="s-btnn">
                    <a href="#">Order Now</a>
                </div>
            </div>
            <div class="top-icon">
                <a href="#"><i class='bx bx-heart' ></i></a>
            </div>
        </div>

        <div class="row">
            <img src="part2.png" width="350" height="300">
            <h3>2JZ</h3>
      
            <div class="in-text">
                <div class="price">
                    <h6>420000tk</h6>
                </div>
                <div class="s-btnn">
                    <a href="#">Order Now</a>
                </div>
            </div>
            <div class="top-icon">
                <a href="#"><i class='bx bx-heart' ></i></a>
            </div>
        </div>

        <div class="row">
            <img src="part3.png" width="300" height="300">
            <h3>4G63T</h3>
            
            <div class="in-text">
                <div class="price">
                    <h6>550000tk</h6>
                </div>
                <div class="s-btnn">
                    <a href="#">Order Now</a>
                </div>
            </div>
            <div class="top-icon">
                <a href="#"><i class='bx bx-heart' ></i></a>
            </div>
        </div>
        
    </div>
    <div class="row-btn">
        <a href="#" class="btn">All Products<i class='bx bxs-right-arrow' ></i></a>
    </div>
</section>
<!---review--->
<section class="review" id="review">
    <div class="middle-text">
        <h4>Our Customer</h4>
        <h2>Clients Review About Our Service</h2>
    </div>
    <div class="review-content">
        <div class="box">
            <p>Really loved the platform. Everything seems so
                good to me.
            </p>
            <div class="in-box">
                <div class="bx-img">
                    <img src="customer1.png" width="50" height="50">
                </div>
                <div class="bxx-text">
                    <h4>Rezaul Bari</h4>
                    <h5>Bussinessman</h5>
                    <div class="ratings">
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <p>The idea is good for busy folks like me. Really loved the cash on delivery system.
            </p>
            <div class="in-box">
                <div class="bx-img">
                    <img src="customer2.jpeg" width="50" height="50">
                </div>
                <div class="bxx-text">
                    <h4>Sheikh Adnan</h4>
                    <h5>Architecture</h5>
                    <div class="ratings">
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <p>Really impressed with the home service method. Hope you guys will improve in future
            </p>
            <div class="in-box">
                <div class="bx-img">
                    <img src="customer3.jpeg" width="50" height="50">
                </div>
                <div class="bxx-text">
                    <h4>Nibrash Ahmed</h4>
                    <h5>Doctor</h5>
                    <div class="ratings">
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                        <a href="#"><i class='bx bxs-star' ></i></a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</section>
<!---Contact us--->
<section class="contact" id="contact">
    <div class="contact-content">
<div class="contact-img">
    <div class="c-one">
        <img src="googleplay.png" width="250" height="250">
    </div>
</div>
<div class="contact-text">
    <h2>Contact Us</h2>
    <p>+880 1746-585025</p>
        <div class="social">
            <a href="#" class="clr"><i class='bx bxl-twitter' ></i></a>
            <a href="#"><i class='bx bxl-facebook' ></i></a>
            <a href="#"><i class='bx bxl-instagram' ></i></a>
            <a href="#"><i class='bx bxl-whatsapp' ></i></a>
            <a href="#"><i class='bx bxl-google' ></i></a>
        </div>
</div>
</section>
<!---details--->
<section class="details" id="details">
    <div class="middle-text1">
        <h2>Developers</h2>
    </div>

    <div class="developer-content">
        <div class="row1">
            <img src="akib.jpeg">
            <h3>Akib Hasan Ayon</h3>
            <div class="in-text1">
                <div class="s-btnn1">
                    <a href="https://www.facebook.com/FakeAyon">Contact</a>
                </div>
            </div>
        </div>

        <div class="row1">
            <img src="lima.jpg" width="350" height="300">
            <h3>Tania Akter Lima</h3>
            <div class="in-text1">
                <div class="s-btnn1">
                    <a href="https://www.facebook.com/tania.lima.25">Contact</a>
                </div>
            </div>
        </div>


        <div class="row1">
            <img src="niloy.jpg" width="350" height="300">
            <h3>Abroor Zahin Niloy</h3>
            <div class="in-text1">
                <div class="s-btnn1">
                    <a href="https://www.facebook.com/abroor.zahin.niloy">Contact</a>
                </div>
            </div>
        </div>


        <div class="row1">
            <img src="naima.jpg" width="300" height="300">
            <h3>Naima Homaira Khan</h3>
            <div class="in-text1">
               <div class="s-btnn1">
                    <a href="https://www.facebook.com/homaira46khan">Contact</a>
                </div>
            </div>
        </div>  
    </div>
     
</section>
<!---link to js--->
<script src="script.js"></script>
    </body>
</html>
