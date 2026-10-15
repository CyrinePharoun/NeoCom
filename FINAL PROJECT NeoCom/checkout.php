<?php
  session_start();
  $conn = new mysqli("localhost", "root", "", "neocom");
  if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="styles.css">
<title>NeoCom - Checkout</title>
<style>

  main {
    max-width: 500px;
    background: white;
    margin: 20px auto;
    border-radius: 5px;
    padding: 20px;
  }
  h2 {
    margin-top: 0;
  }
  form label {
    display: block;
    margin: 15px 0 6px;
  }
  form input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
  }
  button.submit-btn {
    margin-top: 20px;
    background-color: #0073e6;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 3px;
    cursor: pointer;
    width: 100%;
  }
  button.submit-btn:hover {
    background-color: #005bb5;
  }
</style>
</head>
<body>
<header>
  <h1>NeoCom</h1>
  <nav>
      <ul>
        <li><a href="products.php">Products</a></li>
        <li><a href="cart.php">Cart</a></li>
        <?php if(!isset($_SESSION['client'])){echo"<li><a href='login.php'>Login</a></li>";}
         else echo"<li><a href='profile.php'>My Account</a></li>";?>
        <li><a href="about.php">About Us</a></li>
      </ul>
  </nav>
</header>
<?php  
    if(isset($_SESSION['client'])){
    $c_id= $_SESSION['client']['id_client'];
    ?>
<main>
  <h2>Checkout</h2>
  <form method="POST" action="checkout.php">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required />
    <label for="address">Shipping Address</label>
    <input type="text" id="address" name="address" required />
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required />
    <label for="card">Credit Card Number</label>
    <input type="text" id="card" name="card" required pattern='[\d\s]{13,19}' title="Enter valid card number" />
    <label for="password">Credit Card Password</label>
    <input type="password" id="password" name="password" required/>
    <button type="submit" class="submit-btn">Place Order</button>
    </form>
    <?php
if(isset($_POST['name']) && !empty($_POST['address']) &&!empty($_POST['email']) &&!empty($_POST['card']) && !empty($_POST['password'])){
    extract ($_POST);
    $sql="SELECT * FROM credit_card WHERE card_number= $card and client_id=$c_id";
    $res=$conn->query($sql);
        if ($res->num_rows>0){
            $row= $res->fetch_assoc();
            if(password_verify($password, $row['password'])){
                unset($_SESSION['cart']);
                header('location: confirmation.php');
                exit();
            }
        } else{
            echo "<p style='align: center; margin-left: 30%; padding: 20px'> Invalid Password <p>";
        }
    }
  } else{
    header("location:login.php");
  }

?>
</main>
<footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</body>
</html>