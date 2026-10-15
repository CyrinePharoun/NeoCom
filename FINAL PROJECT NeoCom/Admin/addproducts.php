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
        <li><a href="products.php">Products</a></li>
        <?php if ($_SESSION['admin']['type']==1){echo '<li><a href="admin.php">Add admin</a></li>';}?>
        <li><a href="admins.php">Admins</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    </header>
    <fieldset class="products">
    <form action="addproducts.php" method="post" enctype="multipart/form-data" >
        <label for="pname">Product Name:</label>
        <input type="text" name="pname" id="pname"></br>
        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="phone">Phone</option>
            <option value="tablet">Tablet</option>
            <option value="accessories">Accessories</option>
            <option value="laptop">Laptop</option>
        </select>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea></br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price"></input></br>
        <label for="ram">Ram: </label>
        <input type="text" name="ram" id="ram"></br>
        <label for="memory">Memory:</label>
        <input type="text" name="memory" id="memory"></br>
        <label for="battery">Battery:</label>
        <input type="text" name="battery" id="battery"></br>
        <label for="camera">Camera:</label>
        <input type="text" name="camera" id="camera"></br>
        <label for="display">Display:</label>
        <input type="text" name="display" id="display"></br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg"></br>
        <button type="submit" value="submit">Submit</button>
    </form>
    <?php 
     if(isset($_POST['pname']) && (!empty($_POST['type'])) && ($_FILES['image']['error']==UPLOAD_ERR_OK)){
        extract($_POST);
    $conn=new mysqli('localhost','root','','neocom');
    if($conn->connect_error){
        die('Connection failed'. $conn->connect_error);
        }
    $sql="SELECT * from products WHERE product_name='$pname'";
    $res = $conn->query($sql);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
            if ($row['product_name'] == $pname){
                echo"<p style='align: center; padding: 20px'> Product has already been added </p>";
                exit;
            }
        }
    }
    else {
    $sql="INSERT into products (product_name, type, description, price, ram, memory, battery, camera, display,image) values ('$pname', '$type','$description', $price, '$ram', '$memory', '$battery', '$camera', '$display',null)";
    $res = $conn->query($sql);
    if($conn->affected_rows>0){
        echo"<p style='text-align: center; padding: 20px'> Product added successfully </p>";
    }
    else{
        echo"<p style='text-align: center; padding: 20px'> Couldn't add the product </p>";
    }
    }
     if(!is_dir('Product Images')){
        mkdir('Product Images');
     }
     $image = $_FILES['image'];
     $ext= pathinfo($image['name'], PATHINFO_EXTENSION);
     if($ext== 'png' || $ext=='jpg' || $ext =='jpeg' ){
     $imageName= $pname . "." . $ext;
     $path= "Product Images/". $imageName;
     move_uploaded_file($image['tmp_name'], $path);
    $sql="UPDATE products SET image= '$imageName' WHERE product_name = '$pname' ";
    $res= $conn->query($sql);
    if($conn->affected_rows>0){
        echo"<p style='text-align:center; padding:20px;'> Image updated sucessfully </p>";
    }else{echo" <p style='text-align:center; padding:20px;'> Couldn't update image </p>";}
    }
    }
    ?>
    </fieldset>
    <footer style="text-align:center; padding:20px; color:#888; font-size:14px; background-color: transparent;">
        &copy; 2025 NeoCom, All rights reserved
    </footer>
</body>
<?php 
}
else{ header('location:/FINAL%20PROJECT%20NeoCom/admin.php');}
?>