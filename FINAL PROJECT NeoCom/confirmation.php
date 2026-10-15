<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="styles.css" rel="stylesheet">
<title>NeoCom - Order Confirmation</title>
<style>
  fieldset {
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 1.5rem;
  background-color: white;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 1rem;
  margin-top: 5rem;
  margin-left: 20rem;
 margin-right: 20rem;
 text-align: center;
  }
  h2 {
    margin-top: 0;
    color: #0073e6;
  }
  p {
    font-size: 18px;
    margin: 20px 0 35px;
  }
  button.home-btn {
    background-color: #0073e6;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 3px;
    cursor: pointer;
  }
  button.home-btn:hover {
    background-color: #005bb5;
  }
</style>
</head>
<body>
  <?php 
if (isset($_SESSION['client'])){?>
<header>
  <h1>NeoCom</h1>
  <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href='profile.php'>My Account</a></li>
    </ul>
    </nav>
</header>
<fieldset>
  <h2>Thank you for your order!</h2>
  <p>Your order has been placed successfully.</p>
  <form action="index.php" method="post">
  <button class="home-btn">Return to Home</button>
</form>
</fieldset>
<?php } else{ header("location: login.php");}?>

<footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</body>
</html>