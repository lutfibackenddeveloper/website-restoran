<?php
include "db.php";
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("location: login.php");
    exit();
}

if(isset($_GET['hal'])) {
    if($_GET['hal'] == "edit_produk" && isset($_GET['id_produk'])) {
        $id_produk = $_GET['id_produk'];
        $query = mysqli_query($db, "SELECT * FROM produk WHERE id_produk='$id_produk'");
        $data = mysqli_fetch_array($query);
        
        // Cek apakah data produk ditemukan
        if($data) {
            $nama_produk = $data['nama_produk'];
            $harga = $data['harga'];
            $gambar = $data['gambar'];
        } else {
            echo "<script>alert('Data produk tidak ditemukan.');</script>";
            // Redirect atau lakukan tindakan lain jika data tidak ditemukan
            header("location: produk.php");
            exit();
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/edit_produk.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Edit Produk</title>
</head>
<body>
    <div class="container">
        <h2 class="header">Edit Produk</h2>
        <form action="logic.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
            <div class="card">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required>
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="gambar">
                <img src="assets/img/<?php echo $data['gambar']; ?>" alt="Gambar Produk" style="max-width: 100%; height: auto;">
                <button type="submit" name="ganti" class="btn-edit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
