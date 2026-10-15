<?php
session_start();

if (isset($_SESSION['client']) && $_SERVER['REQUEST_METHOD'] === "POST") {

    $client_id = intval($_SESSION['client']['id_client']);
    $qty = isset($_POST['qty']) && intval($_POST['qty']) > 0 ? intval($_POST['qty']) : 1;
    $product_name = $_POST['product_name'];
    $product_id = intval($_POST['product_id']);
    $color=$_POST['color'];
    

    $conn = new mysqli('localhost', 'root', '', 'neocom');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql= "SELECT price FROM products WHERE product_id = $product_id";
    $res=$conn->query($sql);

    if($res->num_rows == 1){
        $row=$res->fetch_assoc();
        $price= $row['price'];
    }

    $cart_key = $product_id . '_' . $color;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart']["$cart_key"])) {
        $_SESSION['cart']["$cart_key"]['quantity'] += $qty;
    } else {
        $_SESSION['cart']["$cart_key"] = [
            'name' => $product_name,
            'price' => $price,
            'color' => $color,
            'quantity' => $qty,
        ];
    }

    $check_sql = "SELECT quantity FROM cart WHERE client_id = $client_id AND product_id = $product_id AND color= '$color'";
    $check_res = $conn->query($check_sql);

    if ($check_res->num_rows > 0) {
        $row = $check_res->fetch_assoc();
        $new_quantity = $row['quantity'] + $qty;

        $update_sql = "UPDATE cart SET quantity = $new_quantity, date= NOW()
                       WHERE client_id = $client_id AND product_id = $product_id AND color = '$color'";
        $conn->query($update_sql);
        if($conn->affected_rows>0) {
             $_SESSION['cart_success'] = true;
        } else {
             $_SESSION['cart_error'] = true;
        }
    } else {
        $insert_sql = "INSERT INTO cart (client_id, product_id, color, quantity, date) 
                       VALUES ($client_id, $product_id, '$color', $qty, NOW())";
        $conn->query($insert_sql);
        if($conn->affected_rows>0) {
             $_SESSION['cart_success'] = true;
        } else {
             $_SESSION['cart_error'] = true;
        }
    }
    if (!empty($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }else {
        header('Location: products.php');
        exit;
    }
} else {
     $_SESSION['cart_error'] = true;
     header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>