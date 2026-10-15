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
        <li><a href="products.php">Products</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    </header>
    <fieldset class="admin">
<table border="1"  style=" margin: 50px auto; justify-content: center; align-items: center" >
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Username</th>
    <th>Type</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
  $conn= new mysqli('localhost','root','','neocom');
  if($conn->connect_error){die("Unexpected error:". $conn-> connect_error);}
  $sql="SELECT * from admins";
  $res= $conn->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['username']."</td><td>"
      .$row['type']."</td><td><a href='edit.php?type=admins&id=".$row['id']."'><img style='width= '16'; height= '16'' src='Logo/edit.png'/>
      </td><td><a href='delete.php?type=admins&id=".$row['id']."'><img style='width= '16'; height= '16'' src='Logo/delete.png'/></td></tr>";
    }
    echo "</table>";
  }
  ?>
</table>
</fieldset>
 <footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</body>
</html>
<?php 
} else {header('location:/FINAL%20PROJECT%20NeoCom/admin.php');}
?>