<?php
session_start();
?>
<?php 
if(isset($_SESSION['admin']['type'])){
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>NeoCom</h1>
        <nav>
      <ul>
        <li><a href="addproducts.php">Add Products</a></li>
        <li><a href="products.php">Products</a></li>
        <?php if ($_SESSION['admin']['type']==1){echo '<li><a href="admin.php">Add admin</a></li>';}?>
        <li><a href="admins.php">Admins</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    </header>
<fieldset class="prod">
  <div class="table-container">
    <table style="margin-left: 20%; margin-right:20%;" border="1">
  <tr>
    <th>Name</th>
    <th>Product Name</th>
    <th>Color</th>
    <th>Quantity</th>
    <th>Date</th>
    <?php 
    $conn=new mysqli('localhost','root','','neocom');
    if($conn->connect_error){
        die('Connection failed'. $conn->connect_error);
        }
    $sql="SELECT * FROM cart 
      JOIN products ON cart.product_id = products.product_id 
      JOIN clients ON cart.client_id = clients.id_client 
      ORDER BY cart.date DESC";
    $res = $conn->query($sql);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
            echo "<tr><td>".$row['name']."</td>
            <td>".$row['product_name']."</td>
            <td>".$row['color']."</td>
            <td>".$row['quantity']."</td>
            <td>".$row['date']."</td></tr>";
            }
        }
        echo "</table>";
    ?>
    </fieldset>
    <footer style="text-align:center; padding:20px; color:#888; font-size:14px; background-color: transparent;">
        &copy; 2025 NeoCom, All rights reserved
    </footer>
</body>
<?php 
}else{ header('location:/FINAL%20PROJECT%20NeoCom/admin.php');}
?>