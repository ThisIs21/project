<?php include 'config.php'; ?>

<h2>Tambah Siswa</h2>
<form method="POST" action="">
    <input type="text" name="nama_siswa" placeholder="Nama Siswa"><br>
    <input type="text" name="kelas" placeholder="Kelas"><br>
    <input type="text" name="jurusan" placeholder="Jurusan"><br>
    <input type="text" name="tanggal_lahir" placeholder="Tanggal Lahir"><br>
    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir"><br>
    <input type="text" name="agama" placeholder="Agama"><br>
    <textarea name="alamat" placeholder="Alamat"></textarea><br>
    <button type="submit" name="submit">Tambah Siswa</button>
</form>

<?php
if (isset($_POST['nama_siswa'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $agama = $_POST['agama'];
    $almat = $_POST['alamat'];

    $sql = "INSERT INTO users (, kelas, jurusan, tanggal_lahir, tempat_lahir, agama, alamat)
            VALUES ('$nama_siswa', '$kelas', '$jurusan', '$tanggal_lahir', '$tempat_lahir', '$agama', '$alamat')";
    if ($conn->query($sql) === TRUE) {
        echo "Data siswa berhasil ditambahkan.";
        header("Location: index.php");
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
