<?php
session_start();
$conn = new mysqli("localhost", "root", "", "neocom");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM products WHERE product_id = $id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="styles.css">
<style>

.container {
    display: flex;
    max-width: 800px;
    margin: auto;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

nav a{
    text-decoration: none;
}
.product-image {
    flex: 1;
    padding: 20px;
}

.product-image img {
    max-width: 100%;
    border-radius: 8px;
}

.product-details {
    flex: 2;
    padding: 20px;
}

.product-details h1 {
    font-size: 24px;
    margin: 0;
}

.price {
    font-size: 20px;
    color: #e67e22;
    margin: 10px 0;
}

.description {
    font-size: 16px;
    margin: 10px 0;
}

h2 {
    margin-top: 20px;
}

.add-to-cart {
    background-color: #e67e22;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.add-to-cart:hover {
    background-color: #d35400;
}</style>
<title>NeoCom - Products</title>
</head>
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
        <li><a href="products.php">Products</a></li>
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

<?php while ($row = $result->fetch_assoc()): ?>
<div class="container">
    <div class="product-image">
        <img src="<?php echo 'Admin/Product Images/' . $row['image']; ?>" alt="<?php echo $row['product_name']; ?>">
    </div>
    <div class="product-details">
        <h1><?php echo $row['product_name']; ?></h1>
        <p class="price"> $<?php echo floatval($row['price']); ?></p>
        <p class="description">
            <?php echo $row['description'];?>
        </p>

        <?php if($row['type']== 'tablet' || $row['type']== 'phone' || $row['type']== 'laptop'):?>
        <h2>Specifications:</h2>
        <ul>
            <li>RAM: <?php echo $row['ram']; ?></li>
            <li>Storage: <?php echo $row['memory']; ?></li>
            <li>Camera: <?php echo $row['camera']; ?></li>
            <li>Battery: <?php echo $row['battery']; ?></li>
            <li>Display: <?php echo $row['display']; ?></li>
        </ul>
        <?php endif; ?>
        <form method="post" action="addToCart.php">
        <input class="qty-input" type="number" name="qty" min="1" value="1" />
        <select class="color" name="color" >
            <option value="white">White</option>
            <option value="silver">Silver</option>
            <option value="black">Black</option>
            <option value="blue">Blue</option>
            <option value="pink">Pink</option>
            <option value="babyblue">Baby Blue</option>
            <option value="babypink">Baby Pink</option>
        </select>
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
            <button class="add-to-cart" type="submit">Add to Cart</button>
        </form>
    </div>
</div>
<?php endwhile; ?>
<footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All Rights Reserved.
</footer>
<?php if (isset($_SESSION['cart_success']) && $_SESSION['cart_success']): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toast = document.createElement('div');
      toast.textContent = "Product added to cart!";
      toast.style.position = "fixed";
      toast.style.bottom = "20px";
      toast.style.right = "20px";
      toast.style.background = "linear-gradient(135deg, #667eea 0%, #764ba2 100%)";
      toast.style.color = "white";
      toast.style.padding = "12px 20px";
      toast.style.borderRadius = "5px";
      toast.style.boxShadow = "0 2px 8px rgba(0,0,0,0.2)";
      toast.style.zIndex = "1000";
      document.body.appendChild(toast);

      setTimeout(() => {
        toast.remove();
      }, 3000);
    });
  </script>
  <?php unset($_SESSION['cart_success']); ?>
  <?php endif; ?>
  <?php if (isset($_SESSION['cart_error']) && $_SESSION['cart_error']): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toast = document.createElement('div');
      toast.textContent = "Unable to add product! Please log in to add products.";
      toast.style.position = "fixed";
      toast.style.bottom = "20px";
      toast.style.right = "20px";
      toast.style.background = "linear-gradient(135deg, #e74c3c 0%, #c0392b 100%)";
      toast.style.color = "white";
      toast.style.padding = "12px 20px";
      toast.style.borderRadius = "5px";
      toast.style.boxShadow = "0 2px 8px rgba(0,0,0,0.2)";
      toast.style.zIndex = "1000";
      document.body.appendChild(toast);

      setTimeout(() => {
        toast.remove();
      }, 3000);
    });
  </script>
  <?php unset($_SESSION['cart_error']); ?>
  <?php endif; ?>
</body>
</html>