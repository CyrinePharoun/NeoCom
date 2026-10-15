<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create Account</title>

</head>
<body>
    <header>
        <h1>NeoCom</h1>
    </header>
    <div class="container1">
        <div class="wrapper">
            <div class="form-section">
                <h2>Create Your Account</h2>
                <form method="POST" action="register.php">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="address">Shipping Address</label>
                        <input type="text" id="address" name="address" required />
                    </div>
                    <div class="form-group password-wrapper">
                            <label for="password">Password</label>
                            <div class="input-icon-wrapper">
                            <input type="password" id="password" name="password" required>
                            <img src="Images/show.png" class="password-toggle" onclick="togglePassword(this)">
                            </div>
                        </div>
                    <div class="form-group password-wrapper">
                            <label for="confirmPassword">Confirm Password</label>
                            <div class="input-icon-wrapper">
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                            <img src="Images/show.png" class="password-toggle" onclick="togglePassword(this)">
                        </div>
                    </div>
                    <div>
                        <label for="card">Credit Card Number</label>
                        <input type="text" id="card" name="card" required pattern='[\d\s]{13,19}' title="Enter valid card number" />
                    </div>
                    <div>
                        <label for="password">Credit Card Password</label>
                        <input type="password" id="C_Password" name="c_Password" required/>
                    </div>
                    <button type="submit" class="btn-primary">Create Account</button>
                </form>
                <div style="margin-left: 25%;">Already have an account? <a href="login.php">Log in</a> </div>
                <div>
                    <?php
                if(isset($_POST['email']) && (!empty($_POST['email'])) && (!empty($_POST['password'])) && (!empty($_POST['firstName'])) && (!empty($_POST['lastName'])) && (!empty($_POST['address'])) && (!empty($_POST['confirmPassword']))&& (!empty($_POST['card']))&& (!empty($_POST['c_Password']))){
                    extract($_POST);
                    $name= $firstName ." ". $lastName;
                    if ($password !== $confirmPassword) {
                        echo "<p style='align: center; margin-left: 25%; padding: 20px>'Passwords do not match.</p>";
                    } else {   
                $con=new mysqli('localhost' , 'root' , '' ,'neocom');
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }
                $check = $con->prepare("SELECT email FROM clients WHERE email = ?");
                $check->bind_param("s", $email);
                $check->execute();
                $check->store_result();
                if ($check->num_rows > 0) {
                echo "<p style=' text-align: center; padding: 20px'> Email already exists.</p>";
                } else {
                $check->close();
                $hashpass= password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT into clients (name, phone, email, password, address, joined) values ('$name', '$phone', '$email', '$hashpass', '$address', NOW()) ";
                $res=$con->query($sql);
                if($con->affected_rows >0){
                    $c_id= $con->insert_id;
                    $c_pass= password_hash($c_Password, PASSWORD_DEFAULT);
                     $sql2="INSERT INTO credit_card (card_number, password, client_id) values ('$card', '$c_pass', $c_id)";
                     $res=$con->query($sql2);
                     if($con->affected_rows>0){
                        echo("<p style='text-align: center; padding: 20px'> You have been registered successfully </p>");
                    }
                } else{echo "<p style='color: red; text-align: center; padding: 20px' '>"."Couldn't register your account"."</p>";
            }
        }
    }
}
            ?>
                </div>
            </div>
            
            <div class="benefits-section">
                <h2>Benefits of Creating an Account</h2>
                <ul class="benefits-list">
                    <li>Faster checkout process</li>
                    <li>Easy access to order history</li>
                    <li>Wishlist functionality</li>
                    <li>Exclusive member discounts</li>
                    <li>Personalized recommendations</li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        function togglePassword(icon){
            const input = icon.previousElementSibling;
            if (input.type==='password'){
                input.type = 'text';
                icon.src = "Images/hide.png";
            }
        else {
            input.type='password';
            icon.src = "Images/show.png";
        }
    }
    </script>
    <footer style="text-align:center; padding:20px; color:#888; font-size:14px; background-color: transparent;">
        &copy; 2025 NeoCom, All rights reserved
    </footer>
</body>
</html>