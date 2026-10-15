<?php
  session_start();
  $conn = new mysqli("localhost", "root", "", "neocom");
  if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
  $sql = "SELECT product_id, image, product_name, price FROM products ";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="styles.css">
<title>NeoCom - Products</title>
</head>
<body>
<header>
<h1>NeoCom</h1>
<form action="search.php" method="get" class="search-container">
  <input type="text" id="searchInput" name="query" placeholder="Search...">
  <button class="search-icon" type="submit">
    <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Search">
  </button>
</form>
  <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="phones.php">Phones</a></li>
        <li><a href="tablets.php">Tablets</a></li>
        <li><a href="laptops.php">Laptops</a></li>
        <li><a href="accessories.php">Accessories</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="about.php">About Us</a></li>
        <?php if(!isset($_SESSION['client'])){echo"<li><a href='login.php'>Login</a></li>";}?>
        <?php if(isset($_SESSION['client'])){echo"<li><a href='profile.php'>My Account</a></li>";}?>
      </ul>
  </nav>
</header>
<main>
  <h2>All Products</h2>
  <div class="products-grid">
  <?php while ($row = $result->fetch_assoc()): ?>
  <div class="product-card" onclick="location.href='product_details.php?id=<?php echo $row['product_id']; ?>'">
    <img src="Admin/Product Images/<?php echo $row['image']; ?>" alt="<?php echo $row['product_name']; ?>">
    <h3><?php echo $row['product_name']; ?></h3>
    <div class="price">$<?php echo floatval($row['price']); ?></div>
  <form method="post" action="product_details.php?id=<?php echo $row['product_id'];?>">
    <button class="view_product" type="submit">View Product</button>
  </form>
  </div>
<?php endwhile; ?>
</div>
</main>
<footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</body>
</html>