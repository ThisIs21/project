<?php
include 'config.php';

$id = $_GET['id'];
$user = $conn->query("SELECT * FROM users WHERE id = $id")->fetch_assoc();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Update data user
    $sql = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: crud_user.php"); // Kembali ke halaman utama
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
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" value="<?= $user['username'] ?>" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="<?= $user['email'] ?>" required><br><br>
        <label for="role">Role:</label><br>
        <select name="role" required>
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select><br><br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>
