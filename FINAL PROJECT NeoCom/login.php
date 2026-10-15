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
        <div class="container1">
  <div class="wrapper">
  

    <div class="form-section">
      <h2>Log Into Your Account</h2>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required> 
        </div>

        <div class="form-group password-wrapper">
          <label for="password">Password</label>
          <div class="input-icon-wrapper">
            <input type="password" id="password" name="password" required>
            <img src="Images/show.png" class="password-toggle" onclick="togglePassword(this)">
          </div>
        </div>

        <div>
          <button type="submit" value="login" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">Login</button>
        </div>

        <div style="margin-left: 25%;">Don't have an account? <a href="register.php">Sign in</a></div>
        <div style="margin-left: 45%;"><a href="index.php">Go back</a></div>

        <div>
          <?php
          if(isset($_POST['email']) && (!empty($_POST['email'])) && (!empty($_POST['password']))){
              extract($_POST);
              $con = new mysqli('localhost' , 'root' , '' ,'neocom');
              if ($con->connect_error) {
                  die("Connection failed: " . $con->connect_error);
              }
              $sql = "SELECT * FROM clients WHERE email='$email'";
              $res = $con->query($sql);
              if($res->num_rows==1){
               $row=$res->fetch_assoc();
               if(password_verify( $password, $row['password'])){
                  $_SESSION['client']=$row;
                  $_SESSION['cart']=[];
                  header("location:index.php");
                  exit();
                }else{ 
                  echo"<p style=' text-align: center; color:red;'> Invalid user or password </p>";
                }
              }
            }
          ?>
        </div>
      </form>
    </div>

    <div class="benefits-section">
      <h2> To enter your account</h2>
      <ul class="benefits-list">
                    <li>Enter your email</li>
                    <li>Enter your password</li>
                    <li>Verify you entered the right password</li>
                    <li>Log in</li>
                    <li>Welcome back and Enjoy!</li>
                </ul>
    </div>

  </div>
</div> 
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
               