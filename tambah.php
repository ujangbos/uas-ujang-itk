<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style/tambah.css">
</head>

<body>

    <div class="form-card">
        <h2><i class="fas fa-user"></i> Tambah Data</h2>
        <form action="tambah_proses.php" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="nama" placeholder="Nama" autocomplete="off">
            </div>
            <div class="input-group">
                <i class="fas fa-id-card"></i>
                <input type="text" name="nim" placeholder="NIM">
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="text" name="nomor" placeholder="Nomor">
            </div>
            <div class="input-group">
                <i class="fas fa-graduation-cap"></i>
                <input type="text" name="jurusan" placeholder="Jurusan">
            </div>
            <button type="submit">Tambah</button>
        </form>
    </div>

</body>

</html>