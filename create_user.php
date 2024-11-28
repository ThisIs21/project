<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pas = hash('sha256', $_POST['password']);
    $role = $_POST['role'];

    
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$pas', 'user')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User</h1>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>
        
     
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>
