<?php
include 'koneksi.php';

// Cek apakah tabel mahasiswa kosong
$result = $conn->query("SELECT * FROM mahasiswa");
$row = $result->fetch_assoc();



echo "<div class='main-content'>";

// Tampilkan tabel mahasiswa jika ada data
$query = "SELECT * FROM mahasiswa";
$result = $conn->query($query);   

if ($result->num_rows > 0) {

  echo "<h2>Data Mahasiswa</h2>";
  echo "<table id='myTable' class='display'>";
  echo "<thead>";
  echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Email</th>
        <th>Nomor</th>
        <th>Jurusan</th>
        <th>Aksi</th> 
      </tr>";
  echo "</thead>";
  echo "<tbody>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['nim'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['nomor'] . "</td>";
    echo "<td>" . $row['jurusan'] . "</td>";

    // Kolom Aksi dengan tautan Edit dan Hapus
    echo "<td>
                
                <a style='color:white; background-color: green; padding: 5px;
    border-radius: 3px;' href='edit.php?id=" . $row['id'] . "' onclick='openEdit()'>Edit</a> 
  
              <a style='color:white; background-color: red; padding: 5px;
    border-radius: 3px;' href='hapus.php?id=" . $row['id'] . "' onclick='return konfir(event, this)'>Hapus</a>
<script>
 function konfir(event, elem) {
  event.preventDefault();
  Swal.fire({
    title: 'Apakah Anda yakin ingin menghapus data ini?',
    text: 'Data yang dihapus tidak dapat dikembalikan!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#1b76fd',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus data!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      // Misalnya proses penghapusan berhasil
      Swal.fire({
  title: 'Berhasil!',
  text: 'Data berhasil dihapus.',
  icon: 'success',
  showConfirmButton: false,
  timer: 1200
      }).then(() => {
        // Arahkan ke halaman yang diperlukan setelah alert sukses
        window.location.href = elem.href;
      });
    }
  });
}

      
</script>


              </td>";
    echo "</tr>";
  }
  echo "<tbody>";
  echo "</table>";
} else {
  echo "<p>Tidak ada data yang tersedia.</p>";
}
echo "<div class='cta'>";
echo "<a class='add-data' href='tambah.php'>Tambah Data</a>";
echo "</div>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="style/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <!-- Tambahkan di bagian <head> atau sebelum tag </body> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>


  <script>
    // Inisialisasi DataTables
    $(document).ready(function () {
      $('#myTable').DataTable({
        "paging": false,
        "searching": true,
        "info": true,
        "lengthChange": false,
        "pageLength": 10

      });
    });


  </script>

</body>

</html>
<?php $conn->close(); ?>