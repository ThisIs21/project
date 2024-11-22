<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM buku WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun'];

    // Cek apakah cover diubah
    if ($_FILES['cover']['name']) {
        $cover = $_FILES['cover']['name'];
        $target_dir = "uploads/";
        move_uploaded_file($_FILES['cover']['tmp_name'], $target_dir . $cover);
    } else {
        $cover = $data['cover'];
    }

    $sql = "UPDATE buku SET judul = '$judul', penerbit = '$penerbit', pengarang = '$pengarang', tahun = '$tahun', cover = '$cover' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: user.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="judul" value="<?= $data['judul'] ?>" required><br><br>
        
        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>" required><br><br>
        
        <label>Pengarang:</label><br>
        <input type="text" name="pengarang" value="<?= $data['pengarang'] ?>" required><br><br>
        
        <label>Tahun:</label><br>
        <input type="number" name="tahun" value="<?= $data['tahun'] ?>" required><br><br>
        
        <label>Cover Buku:</label><br>
        <input type="file" name="cover"><br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
