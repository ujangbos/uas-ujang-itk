<?php
include 'koneksi.php'; // Pastikan koneksi ke database

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$jurusan = $_POST['jurusan'];

// Cek apakah NIM sudah ada di database
$query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Jika NIM sudah ada, tampilkan SweetAlert dengan pesan error dan redirect kembali ke halaman tambah
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'NIM sudah ada!',
                text: 'Masukkan NIM yang berbeda.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'tambah.php';
                }
            });
          </script>";
} else {
    // Jika NIM belum ada, lakukan insert data ke database
    $insert = "INSERT INTO mahasiswa (nama, nim, email, nomor, jurusan) 
               VALUES ('$nama', '$nim', '$email', '$nomor', '$jurusan')";
    if (mysqli_query($conn, $insert)) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil ditambahkan!',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'index.php'; // redirect ke halaman utama setelah berhasil menambah data
                });
              </script>";
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan!',
                    text: 'Data gagal ditambahkan.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'tambah.php';
                    }
                });
              </script>";
    }
}

mysqli_close($conn);
?>

