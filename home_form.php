<?php
session_start();
if (!isset($_SESSION["users_log"])) {
   header("Location: login_form.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Sales CRM</title>

    <link rel="stylesheet" href="homepage.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

</head>

<body>

<div class="homepage">
    <nav>
      <div class="navbar">

        <div class="dash">
        <img >
            <h1>Dashboard</h1>
        </div>

        <ul>
          <li><a href="#">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
          </a>
          </li>

          <li><a href="#">
            <i class="fa-solid fa-bullseye"></i>
            <span>Lead</span>
          </a>
          </li>

          <li><a href="#">
            <i class="fa-solid fa-user"></i>
            <span>Contacts</span>
          </a>
          </li>

          <li><a href="#">
            <i class="fas fa-chart-line"></i>
            <span>Activity</span>
          </a>
          </li>

          <li>
            <a href="logout_form.php" class="logout" onclick="logoutPage('login_form.php')">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
          </li>
        
        </ul>

    </nav>

    <section>


    </section>

</div>

</body>
</html>