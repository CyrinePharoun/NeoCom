<?php
session_start();
?>
<?php 
if(isset($_SESSION['admin'])){
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
        <?php if ($_SESSION['admin']['type']==1){echo '<li><a href="admin.php">Add admins</a></li>';}?>
        <li><a href="admins.php">Admins</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    </header>
<fieldset class="prod">
  <div class="table-container">
    <table class="prod" border="1">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Type</th>
    <th>Description</th>
    <th>Price</th>
    <th>Ram</th>
    <th>Memory</th>
    <th>Battery</th>
    <th>Camera</th>
    <th>Display</th>
    <th>Image</th> 
    <th>Edit</th>   
    <th>Delete</th>            
  <?php
  $conn= new mysqli('localhost','root','','neocom');
  if($conn->connect_error){die("Unexpected error:". $conn-> connect_error);}
  $sql="SELECT * from products";
  $res= $conn->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      echo "<tr><td>".$row['product_id']."</td><td>".$row['product_name']."</td><td>".$row['type']."</td><td>".$row['description']
      ."</td><td>".$row['price']."</td><td>".$row['ram']."</td><td>".$row['memory']."</td><td>".$row['battery']."</td><td>".$row['camera']."</td><td>".$row['display']
      ."</td><td>"."
      <a href='Product Images/".$row['image']."' target='_blank'>". $row['image']."</a></td>
      <td><a href='edit.php?type=products&id=".$row['product_id']."'><img  src='Logo/edit.png' style= 'width= '16'; height= '16''/><a>
      </td><td><a href='delete.php?type=products&id=". $row['product_id']."'><img src='Logo/delete.png' style= 'width= '16'; height= '16''/></a></td></tr>";
    }
    }
  ?>
</table>
</div>
</fieldset>
 <footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</html>
<?php 
} else { header('location: /FINAL%20PROJECT%20NeoCom/admin.php');}
?>