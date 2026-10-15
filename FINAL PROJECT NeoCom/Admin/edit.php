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
        <?php if ($_SESSION['admin']['type']==1){echo '<li><a href="admin.php">Add admin</a></li>';}?>
        <li><a href="products.php">Products</a></li>
        <li><a href="admins.php">Admins</a></li>
        <li><a href="clients.php">Clients</a></li>
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </nav>
    </header>
    <fieldset class="admins">
<?php
$conn = new mysqli('localhost', 'root', '', 'neocom');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_GET['id']) || !isset($_GET['type'])) {
    die("Missing ID or type.");
}
$id = intval($_GET['id']);
$type = $_GET['type'];
$valid_types = [
    'clients' => 'id_client',
    'products' => 'product_id',
    'admins' => 'id'
];
if (!array_key_exists($type, $valid_types)) {
    die("Invalid type.");
}
$table = $type;
$primary_key = $valid_types[$type];
$sql = "SELECT * FROM $table WHERE $primary_key = $id";
$res = $conn->query($sql);
if (!$res || $res->num_rows !== 1) {
    die("Record not found.");
}
$row = $res->fetch_assoc();
?>
<h2>Edit <?php echo trim($type, 's'); ?></h2>
<form method="post">
    <?php
    foreach ($row as $column => $value) {
        if ($column === $primary_key || $column === 'password') continue;
         if ($column === 'description') {
        echo "<label>$column:</label>
              <textarea name='$column'>" . htmlspecialchars($value) . "</textarea><br>";
        continue;
    }
     if ($column === 'image') {
        echo "<label>$column:</label>
              <input type='file' name='$column'><br>
              <label>Current Image: $value</label>";
        continue;
    }
        echo "<label>$column:</label><input type='text' name='$column' value='" . htmlspecialchars($value) . "'><br>";
    }
    ?>
    <button type="submit">Update</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $updates = [];

    foreach ($_POST as $column => $value) {
        $updates[] = "$column = '$value'";
    }

    $sql_update = "UPDATE $table SET " . implode(', ', $updates) . " WHERE $primary_key = $id";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: {$type}.php");
        exit;
    } else {
        echo "Error updating: " . $conn->error;
    }
}
?>
</fieldset>
</body>
</html>
<?php } else { 
    header('location: /FINAL%20PROJECT%20NeoCom/admin.php');
}