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
$sql = "DELETE FROM $table WHERE $primary_key = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: {$type}.php");
} else {
    echo "Error deleting: " . $conn->error;
}

exit;
?>