<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width= device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
        <h1>NeoCom</h1>
        </header>
        <center>
        <form action="admin.php" method="post">
            <fieldset class="login">
                <legend>Log in</legend>
                    <div class="form-group password-wrapper">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required> 
                    </div>
                    <div class="form-group password-wrapper">
                            <label for="password">Password</label>
                            <div class="input-icon-wrapper">
                            <input type="password" id="password" name="password" required>
                            <img src="Images/show.png" class="password-toggle" onclick="togglePassword(this)">
                            </div>
                        </div>
                    </div>
                    <div>
                    <button type="submit" value="login">Login</button>
                    </div>
            </fieldset>
            <div>
                <a href="index.php">Go back</a>
        </div>
            <div>
                <?php
                if(isset($_POST['username']) && (!empty($_POST['username'])) && (!empty($_POST['password']))){
              extract($_POST);
              $con = new mysqli('localhost' , 'root' , '' ,'neocom');
              if ($con->connect_error) {
                  die("Connection failed: " . $con->connect_error);
              }
              $sql = "SELECT * FROM admins WHERE username='$username'";
              $res = $con->query($sql);
              if($res->num_rows==1){
                $row=$res->fetch_assoc();
                if (password_verify($password, $row['password'])){
                $_SESSION['admin']=$row;
                  header("location:Admin/addproducts.php");
                  exit();
                }else{ 
                  echo"<p style='color:red;'> Invalid user or password </p>";
                }
            }
        }
                ?>
            </div>
        </form>
        </center>
        <footer style="text-align:center; padding:20px; color:#888; font-size:14px; background-color: transparent;">
            &copy; 2025 NeoCom, All rights reserved
        </footer>
    </body>
    <script>
        function togglePassword(icon){
            const password= document.getElementById('password');
            if (password.type==='password'){
                password.type = 'text';
                icon.src = "Images/hide.png";
            }
        else {
            password.type='password';
            icon.src = "Images/show.png";
        }
    }
    </script>
    
</html>
               