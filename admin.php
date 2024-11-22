<?php
session_start(); // Mulai session
include 'config.php'; // Koneksi database

// Cek apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php"); // Jika tidak login atau bukan admin, arahkan ke halaman login
    exit();
}

// Mengambil data buku dan user
$buku_result = $conn->query("SELECT * FROM buku");
$user_result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <p>Welcome, <?= $_SESSION['username']; ?>! <a href="logout.php">Logout</a></p>
    
    <!-- CRUD Buku -->
    <h2>Daftar Buku</h2>
    <a href="create_buku.php">Tambah Buku</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Cover</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $buku_result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><?= $row['penerbit'] ?></td>
                    <td><?= $row['pengarang'] ?></td>
                    <td><?= $row['tahun'] ?></td>
                    <td><img src="uploads/<?= $row['cover'] ?>" alt="Cover" width="100"></td>
                    <td>
                        <a href="update_buku.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a href="delete_buku.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- CRUD User -->
    <h2>Daftar User</h2>
    <a href="create_user.php">Tambah User</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $user_result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
