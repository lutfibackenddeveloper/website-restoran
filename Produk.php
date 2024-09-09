<?php
    include "db.php";
    session_start();

    if(!isset($_SESSION['role'])) {
        header("location: login.php");
      }else{
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/produk.css">
    <title>Dashboard Pengguna</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h2 class="header">Menu Makanan dan Minuman</h2>




<div class="content user-dashboard">
<a class="add-product-btn" href="Tproduk.php">Tambah Menu</a>
<?php
    include "side.php";
    ?>
   
    
    
    <!-- Menampilkan data produk dalam tabel -->
     <?php

$produk = mysqli_query($db, "SELECT * FROM produk");
while($row = mysqli_fetch_array($produk)) {
    echo "<div class='card'>";
    echo "<p>Nama: " . $row['nama_produk'] . "</p>";
    echo "<p>Harga: Rp " .number_format($row['harga']) . "</p>";
    echo "<img src='assets/img/" . $row['gambar'] . "' alt='Produk'>";
    echo "<a class='edit-btn' href='edit_produk.php?hal=edit_produk&id_produk=" . $row['id_produk'] . "'>Edit</a>";
    echo "<a class='delete-btn' href='logic.php?id_produk=" . $row['id_produk'] . "' onclick='return confirm(\"Apakah anda yakin menghapus data?\")'>Hapus</a>";

    echo "</div>";
}

?>

    <!-- <div class="card">
        <p>Nama: Coto Makassar</p>
        <p>Harga: Rp 57,000</p>
        <img src="assets/img/coto makassar.jpeg" alt="Produk Populer">
        <button class="edit-btn" name="EditProduk"><a href="#">Edit</a></button>
        <button class="delete-btn">Hapus</button>
    </div>
    <div class="card">
        <p>Nama: Mie Bakso</p>
        <p>Harga: Rp 120,000</p>
        <img src="assets/img/mie bakso.jpeg" alt="Produk Terlaris">
        <button class="edit-btn" name="EditProduk"><a href="#">Edit</a></button>
        <button class="delete-btn">Hapus</button>
    </div>
    <div class="card">
        <p>Nama: Rendang</p>
        <p>Harga: Rp 350,000</p>
        <img src="assets/img/rendang.jpeg" alt="Produk Baru">
        <button class="edit-btn" name="EditProduk"><a href="#">Edit</a></button>
        <button class="delete-btn">Hapus</button>
    </div> -->
</div>
</body>
</html>
