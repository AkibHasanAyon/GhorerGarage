<?php
include_once 'db_connection.php';
session_start();


?>
<aside class="profile-card">
  
  <header>
    
    <!-- here’s the avatar -->
    <a>
    <img src="user.png" >
    </a>

    <!-- the username -->
   <?php $session_username = $_SESSION['username'];
$select_users = "SELECT * FROM users WHERE username = '$session_username'";
$result = $connection->query($select_users);

if ($result === false) {
    die('Error: ' . $connection->error);
}

$row = $result->fetch_assoc();
echo "<h1><strong>Username:</strong> " . $row['username'] ."</h1>";
echo "<h2><strong>First Name:</strong> " . $row['first_name'] ."</h2>";
echo "<h2><strong>Last Name:</strong> " . $row['last_name'] ."</h2>";
echo "<h2><strong>Mobile no:</strong> " . $row['mobile'] ."</h2>";
echo "<h2><strong>Email:</strong> " . $row['email'] ."</h2>";
echo "<h2><strong>Address:</strong> " . $row['address'] ."</h2>";

?>
<form action="user_front_page.php" method="POST">
  <button class='button1'>Return</button>
</aside>
<!-- that’s all folks! -->
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700);

*, *:after, *:before {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;

    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;

    font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    font-smooth: always;

    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

    font-family: inherit;

    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

body {
    font: 300 13px/1.6 Roboto, Helvetica, Arial;
    color: #444;
    position: relative;
    background: #448AFF;
    height: 100vh;
    text-align: center;
    /*background: #3f51b5;*/

    background: url('http://ali.shahab.pk/blur.php?img=http://ali.shahab.pk/ali-shahab.jpg&x=250') no-repeat center center;
    background-size: cover;
}
body:after{
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    background-color: rgba(0,0,0,.5);
    z-index: -1
}

ul{
    list-style: none;
}

img {
    -ms-interpolation-mode: bicubic;
    vertical-align: middle;
    border: 0;
}

.profile-card{
    width: 300px;
    border-radius: 2px;
    overflow: hidden;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    position: relative;
    margin: auto;
    background: rgba(255,255,255,1);
    top: 50%;
    transform: translateY(-50%);
}

.profile-card header{
    display: block;
    position: relative;
    background: rgba(255,255,255,1);
    text-align: center;
    padding: 30px 0 20px;
    z-index: 1;
    overflow: hidden;
}

.profile-card header:before{
    content: "";
    position: absolute;
    background: url('http://ali.shahab.pk/blur.php?img=http://ali.shahab.pk/ali-shahab.jpg&x=60') no-repeat;
    background-size: cover;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: -1;
    
}

.profile-card header:after{
    content: "";
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background-image: linear-gradient(
        to bottom,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 1) 100%
    );
}

.profile-card header img{
    border-radius: 100%;
    overflow: hidden;
    width: 150px;
    /*border: 1px solid rgba(255,255,255,.5);*/
    box-shadow: 0 1px 0 rgba(0,0,0,.1),0 1px 2px rgba(0,0,0,.1);
}

.profile-card header h1{
    font-weight: 200;
    font-size: 42px;
    color: #444;
    letter-spacing: -3px;
    margin: 0;
    padding: 0;
}

.profile-card header h2{
    font-weight: 400;
    font-size: 14px;
    color: #666;
    letter-spacing: .5px;
    margin: 0;
    padding: 0;
}

.profile-card .profile-bio{
    padding: 0 30px;
    text-align: center;
    color: #888;
}

.profile-card .profile-social-links{
    display: table;
    width: 70%;
    margin: 20px auto;
}

.profile-card .profile-social-links li{
    display: table-cell;
    width: 33.3333333333333333%
}

.profile-card .profile-social-links li a{
    display: block;
    text-align: center;
    padding: 10px;
    margin: 0 10px;
    border-radius: 100%;
    -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    -o-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;
}
.profile-card .profile-social-links li a:hover{
    box-shadow: 0 1px 1.5px 0 rgba(0,0,0,.12),0 1px 1px 0 rgba(0,0,0,.24);
}

.profile-card .profile-social-links li a:active{
    box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);
}

.profile-card .profile-social-links li a img{
    width: 100%;
    display: block;
}
.button1{
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