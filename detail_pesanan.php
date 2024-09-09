<?php
include "db.php";
session_start();

if (!isset($_SESSION['role'])) {
    header("location: login.php");
    exit();
}

$id_pemesanan = $_GET['id'];

// Ambil data pesanan berdasarkan id_pemesanan
$query = mysqli_query($db, "SELECT * FROM pesanan WHERE id_pemesanan='$id_pemesanan'");
$pesanan = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <link rel="stylesheet" href="assets/css/detail pemesanan.css">
</head>
<body>
    <?php
    include "side.php"
    ?>
    <main class="container">
        <h1>Detail Pemesanan</h1>
        <table>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Id Pesanan</td>
                    <td>Nama Pesanan</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Subharga</td>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
                <?php 
                // Ambil detail pesanan
                $ambil = $db->query("SELECT dp.*, p.nama_produk, p.harga FROM detail_pemesanan dp JOIN produk p ON dp.id_produk = p.id_produk WHERE dp.id_pemesanan = '$id_pemesanan'");
                while ($pecah = $ambil->fetch_assoc()) {
                    $subharga1 = $pecah['harga'] * $pecah['jumlah'];
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor; ?></th>
                    <td><?php echo $id_pemesanan; ?></td> <!-- Menampilkan id_pemesanan -->
                    <td><?php echo $pecah['nama_produk']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                    <td><?php echo $pecah['jumlah']; ?></td>
                    <td>Rp. <?php echo number_format($subharga1); ?></td>
                </tr>
                <?php 
                    $nomor++; 
                    $totalbelanja += $subharga1; 
                } 
                ?>
            </tbody>
        </table>
       
    </main>
    <a href="pesanan.php" class="btn">Kembali ke Daftar Pesanan</a>
</body>
</html>
