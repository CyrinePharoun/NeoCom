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
        <li><a href="products.php">Products</a></li>
        <li><a href="admins.php">Admins</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </nav>
    </header>
    
    <fieldset class="admins">
    <form action="admin.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required></br>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required></br>
        <div class="form-group password-wrapper">
          <label for="password">Password</label>
          <div class="input-icon-wrapper">
            <input type="password" id="password" name="password" required>
            <img src="Logo/show.png" class="password-toggle" onclick="togglePassword(this)">
          </div>
        </div>
        <div>
        <label for="type">Type:</label>
        <input type="number" name="type" id="type" min="0" max="1" required></br>
        </div>
        <div>
            <button type="submit">Create Admin</button>
        </div>
                <?php
                if(isset($_POST['username']) && (!empty($_POST['username'])) && (!empty($_POST['password'])) && (isset($_POST['type']))){
                    extract($_POST);
                $con=new mysqli('localhost' , 'root' , '' ,'neocom');
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }
                $check = $con->prepare("SELECT username FROM admins WHERE username = ?");
                $check->bind_param("s", $username);
                $check->execute();
                $check->store_result();
                if ($check->num_rows > 0) {
                echo " <p style='align: center; margin-left: 40%; padding: 20px'> Username already exists.</p>";
                }else{
                $check->close();
                $hashpass=password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT into admins (name, username, password, type) values ('$name','$username','$hashpass', $type)";
                $res=$con->query($sql);
                if($con->affected_rows >0){
                     echo("<p style='align: center; margin-left: 40%; padding: 20px'> Admin created successfully <p>");
                }
                  else{ echo "<p style='color: red; align: center; padding: 20px' '>"."Couldn't create admin"."</p>";
                }
            }
        }
                ?>
            </div>
    </form>
    </fieldset>
    <script>
        function togglePassword(icon){
            const password= document.getElementById('password');
            if (password.type==='password'){
                password.type = 'text';
                icon.src = "Logo/hide.png";
            }
        else {
            password.type='password';
            icon.src = "Logo/show.png";
        }
    }
    </script>
    <footer style="text-align:center; padding:20px; color:#888; font-size:14px; background-color: transparent;">
        &copy; 2025 NeoCom, All rights reserved
    </footer>
</body>
</html>
<?php }?>
