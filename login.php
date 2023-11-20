<?php
include_once 'db_connection.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];


    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['role'] === 'admin' && $row['password'] === $password) {
            $_SESSION['username'] = $row['username'];
            redirectToPage('./admin_front/admin_front.php');
        }
        elseif ($row['role'] === 'mechanic' && (password_verify($password, $row['password']))) {
            $_SESSION['username'] = $row['username'];
            redirectToPage('mech_front_page.php');
        }
        elseif (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            redirectToPage('user_front_page.php');
        } else {
            redirectToPage('relogin.html', 'error=invalid');
        }
    } else {
        redirectToPage('relogin.html', 'error=notfound');
    }
}

function redirectToPage($page, $queryString = '') {
    $location = $page;
    if ($queryString !== '') {
        $location .= '?' . $queryString;
    }
    header("Location: $location");
    exit();
}
?>