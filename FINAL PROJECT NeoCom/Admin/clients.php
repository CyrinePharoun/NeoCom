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
        <li><a href="products.php">Products</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    </header>
    <fieldset class="client">
    <table border="1" style="margin-left:5% ;margin-right:5%;">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    <th>Card Number</th>
    <th>Joined</th>
    <th>Edit</th>   
    <th>Delete</th>            
  <?php
  $conn= new mysqli('localhost','root','','neocom');
  if($conn->connect_error){die("Unexpected error:". $conn-> connect_error);}
  $sql="SELECT * from clients JOIN credit_card where clients.id_client = credit_card.client_id";
  $res= $conn->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      echo "<tr><td>".$row['id_client']."</td><td>".$row['name']."</td><td>".$row['phone']."</td><td>".$row['email']."</td><td>".$row['address']
      ."</td><td>".$row['card_number']."</td><td>".$row['joined']."</td><td><a href='edit.php?type=clients&id=".$row['id_client']."'><img  src='Logo/edit.png' style= 'width= '16'; 
      height= '16''/></td><td><a href='delete.php?type=clients&id=". $row['id_client']."'><img src='Logo/delete.png' style= 'width= '16'; height= '16''/></td></tr>";
    }
    $sql1= "SELECT COUNT(*) AS clients FROM clients;";
    $res=$conn->query($sql1);
    $row1=$res->fetch_assoc();
    echo "<tr><th colspan='9' style='text-align:center;'>Total Clients: " . $row1['clients'] . "</th></tr></table>";
    }
  ?>
</table>
</fieldset>
 <footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</html>
<?php 
} else { header('location: /FINAL%20PROJECT%20NeoCom/admin.php');}
?>