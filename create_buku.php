<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun'];
    
    // Upload gambar
    $cover = $_FILES['cover']['name'];
    $target_dir = "uploads/";
    move_uploaded_file($_FILES['cover']['tmp_name'], $target_dir . $cover);

    // Simpan ke database
    $sql = "INSERT INTO buku (judul, penerbit, pengarang, tahun, cover) 
            VALUES ('$judul', '$penerbit', '$pengarang', '$tahun', '$cover')";

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
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="judul" required><br><br>
        
        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" required><br><br>
        
        <label>Pengarang:</label><br>
        <input type="text" name="pengarang" required><br><br>
        
        <label>Tahun:</label><br>
        <input type="number" name="tahun" required><br><br>
        
        <label>Cover Buku:</label><br>
        <input type="file" name="cover" required><br><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
