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
    <link rel="stylesheet" href="assets/css/Tproduk.css">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Produk Barang</h1>
    <form action="logic.php" method="post" enctype="multipart/form-data">
        <label for="nama_produk">Nama Produk:</label><br>
        <input type="text" id="nama_produk" name="nama_produk" required><br>
        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" required><br>
        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar" required><br>
        <input type="submit" name="tambah_produk" value="Tambah Produk"><br>
        <br>
        <a href="Produk.php" class="kembali-btn">Kembali</a><br>
    </form>
</body>
</html>