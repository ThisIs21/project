<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM buku WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: user.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
