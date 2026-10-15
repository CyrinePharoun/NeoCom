<?php
session_start();
if(isset ($_SESSION['client'])){
    $c_id=$_SESSION['client']['id_client'];
$conn = new mysqli('localhost', 'root', '', 'neocom');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])&& isset($_GET['color'])){
$id=intval($_GET['id']);
$color=$_GET['color'];


$cart_key = $id . '_' . $color;
    if (isset($_SESSION['cart'][$cart_key])) {
        unset($_SESSION['cart'][$cart_key]);
    }

$sql="DELETE from cart WHERE product_id = $id and client_id=$c_id and color= '$color'";
$res=$conn->query($sql);
if($conn->affected_rows>0){
    header('location: cart.php');

} else {
    echo "<p>Couldn't delete item. Please try again later!</p><br><a href='cart.php'>Go back</a>";

} 
}  else {
        echo "Invalid product ID.";
    }
} else {
    echo "You must be logged in to access this page.";
}
?>