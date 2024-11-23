<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM mahasiswa WHERE id =$id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style/edit.css">
</head>

<body>

    <div class="form-card">
        <h2> Edit Data</h2>
        <form action="edit_proses.php" method="POST">
            <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                <i class="fas fa-user"></i>
                <input type="text" name="nama" value="<?php echo $data['nama'];?>" placeholder="Nama"">
            </div>
            <div class="input-group">
                <i class="fas fa-id-card"></i>
                <input type="text" name="nim" value="<?php echo $data['nim'];?>" placeholder="NIM">
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" value="<?php echo $data['email'];?>" placeholder="Email">
            </div>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="text" name="nomor" value="<?php echo $data['nomor'];?>" placeholder="Nomor">
            </div>
            <div class="input-group">
                <i class="fas fa-graduation-cap"></i>
                <input type="text" name="jurusan" value="<?php echo $data['jurusan'];?>" placeholder="Jurusan">
            </div>
            <button type="submit">Edit</button>
        </form>
    </div>

</body>

</html>