<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="styles.css"/>
<title>NeoCom - Shopping Cart</title>
<link rel="stylesheet" href="styles.css"/>
<style>
  fieldset{
    box-shadow: #444;
    border-radius: 30px;
    border:white;
    background-color: white;
    margin-top: 5%;
    margin-left: 20%;
    margin-right: 20%;
    text-align: center;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
  }
  table th, table td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
  }

  tfoot th, tfoot td {
  padding-top: 0px;
  padding-bottom: 0px;
  line-height: 1.2;
  vertical-align: middle;
}

  table th {
    background-color: #eee;
  }
  .qty-input {
    width: 50px;
    padding: 5px;
    font-size: 16px;
    text-align: center;
  }
  button.checkout-btn {
    margin-top: 20px;
    background-color: #0073e6;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 3px;
    cursor: pointer;
  }
  button.checkout-btn:hover {
    background-color: #005bb5;
  }
  .empty-msg {
    margin-top: 40px;
    font-size: 18px;
    color: #444;
  }
</style>
</head>
<?php
session_start();
?>
<body>
<header>
  <h1 >NeoCom</h1>
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
        <li><a href="about.php">About Us</a></li>
        <?php if (!isset($_SESSION['client'])){echo "<li><a href='login.php'>Login</a></li>";}
        else {echo "<li><a href='profile.php'>My Account</a></li>";}?>
        </ul>
    </nav>
  </nav>
</header>
<main>
  <?php 
  if (isset($_SESSION['client'])){
  if (!empty($_SESSION['cart'])){ ?>
  <h2>Your Shopping Cart</h2>
  <table id="table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Color</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0;
          foreach ($_SESSION['cart'] as $cart_key => $item):
            list($product_id, $color) = explode('_', $cart_key);
              $subtotal = $item['price'] * $item['quantity'];
              $total += $subtotal;?>
        <tr>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo $item['color'];?></td>
        <td><?php echo $item['price']."$"; ?></td>
        <td> <?php echo $item['quantity'];?></td>
        <td>
          <?php
            echo ($item['price']*$item['quantity']."$"); ?></td>
            <td><a href="delete.php?id=<?php echo $product_id;?>&color=<?php echo $color;?>"><img src="Admin/Logo/delete.png" alt="Remove item" style="width: 16px; height: 16px"/></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5" style="text-align:right;">Total:</th>
          <th colspan="1" style="text-align:right;"><p id="resultat"><?php echo $total; ?>$</p>
        </th>
      </tr>
    </tfoot>
  </table>
  <form action="checkout.php">
  <button class="checkout-btn" >Proceed to Checkout</button>
  </form>
  <?php } else { ?>

<fieldset style="margin-left: 20%; margin-right: 20%;">
 <h2>Your Cart is empty</h2><br>
  <p> Let's go back to fill it with awsome products <a href='products.php'> Click me!</a></p>
  </fieldset>
  <?php }?>

<?php } else { ?>
<fieldset class="notLogged"  style="margin-left: 20%; margin-right: 20%; text-align:center;">
 <h2>You have to be logged in to view to your cart</h2>
  <p>Please log in to add products to your cart<br><a href='login.php'>Log in</a></p>
  </fieldset>
  <?php }?>
</main>
<footer style="text-align:center; padding:20px; color:#888; font-size:14px; background-color: transparent;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</body>
</html>