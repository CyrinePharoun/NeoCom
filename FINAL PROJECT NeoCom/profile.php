<?php 
session_start();
if(isset($_SESSION['client'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>NeoCom - User Profile</title>
<link href="styles.css" rel="stylesheet">
</head>
<body>
<header>
  <h1> NeoCom</h1>
  <form action="search.php" method="get" class="search-container">
  <input type="text" id="searchInput" name="query" placeholder="Search...">
  <button class="search-icon" type="submit">
    <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Search">
  </button>
</form>
  <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="phones.php">Phones</a></li>
        <li><a href="tablets.php">Tablets</a></li>
        <li><a href="laptops.php">Laptops</a></li>
        <li><a href="accessories.php">Accessories</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href='logout.php'>Logout</a></li>
        </ul>
      </ul>
    </nav>
</header>
<fieldset class="profile">
  <h2>User Profile</h2>
  <div class="profile-details">
    <div>Full Name: <?php echo $_SESSION['client']['name']; ?></div>
    
    <div>Email: <?php echo $_SESSION['client']['email']; ?></div>

    <div>Shipping Address: <?php echo $_SESSION['client']['address']; ?></div>

    <div>Member Since: <?php echo $_SESSION['client']['joined']; ?></div>

  </div>
</fieldset>
<footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</body>
</html>
<?php } else {header('location: index.php');}?>