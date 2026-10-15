<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="styles.css">
  <title>NeoCom</title>
</head>
<body>
  <header>
    <h1><a href="admin.php">NeoCom</a></h1>
    <form action="search.php" method="get" class="search-container">
  <input type="text" id="searchInput" name="query" placeholder="Search...">
  <button class="search-icon" type="submit">
    <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Search">
  </button>
</form>
    <nav>
      <ul>
        <li><a href="products.php">Products</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="about.php">About Us</a></li>
        <?php if(!isset($_SESSION['client'])){echo"<li><a href='login.php'>Login</a></li>";}
         else {echo"<li><a href='profile.php'>My Account</a></li>";}?>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home" class="active">
      </br>
      <h1 style="text-align:center; font-size: 200%; font-family: cursive;">Welcome to NeoCom!</h1>
      <fieldset class="register form" style="background:linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:white; text-align: center;">
      <p>
        Your one-stop destination for the latest and greatest in electronics. </br>
        Whether you're upgrading your tech or looking for the perfect gadget, 
        we're here to help you power up your world.
      </p>
      </fieldset>
      <h3>Featured Products</h3>
      <div class="products-grid">
        <div class="prod-c" onclick="location.href='phones.php'">
          <div class="img-wrapper">
            <img src="Images/phones.png" alt="Smartphone" />
          </div>
          <h3>Phones</h3>
        </div>
        <div class="prod-c" onclick="location.href='laptops.php'">
        <div class="img-wrapper">
          <img src="Images/laptops.png" alt="Laptops" />
        </div>
          <h3>Laptops</h3>
        </div>
        <div class="prod-c" onclick="location.href='tablets.php'">
          <div class="img-wrapper">
            <img src="Images/tablets.png" alt="Tablets" />
          </div>
          <h3>Tablets</h3>
        </div>
        <div class="prod-c" onclick="location.href='accessories.php'">
        <div class="img-wrapper">
          <img src="Images/accessories.png" alt="Accessories" />
        </div>
          <h3>Accessories</h3>
        </div>
      </div>
    </section>
    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 2rem; border-radius: 8px; margin: 2rem 0; text-align: center;">
        <h2 style="margin-top: 0; margin-bottom: 2rem; font-size: 2rem;">NeoCom by the Numbers</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 2rem;">
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">50K+</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Happy Customers</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">2,500+</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Products Available</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">1</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Years in Business</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">99.8%</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Customer Satisfaction</div>
          </div>
        </div>
      </div>
  

  <footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</main>
</body>
</html>


