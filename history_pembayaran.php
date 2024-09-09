<?php
include "db.php";
session_start();

if (!isset($_SESSION['role'])) {
    header("location: login.php");
    exit();
}

// Ambil data history pembayaran
$query = mysqli_query($db, "SELECT * FROM pembayaran ORDER BY tanggal_pembayaran DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pembayaran</title>
    <link rel="stylesheet" href="assets/css/history_pembayaran.css">
</head>
<body>
    <?php
    include "side.php"
    ?>
<main class="container">
    <h1>History Pembayaran</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pemesanan</th>
                <th>Tanggal Pembayaran</th>
                <th>Metode Pembayaran</th>
                <th>Total Pembayaran</th>
                <th>Jumlah Bayar</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?php echo $data['id_pembayaran']; ?></td>
                <td><?php echo $data['tanggal_pembayaran']; ?></td>
                <td><?php echo $data['metode_pembayaran']; ?></td>
                <td>Rp. <?php echo number_format($data['total_pembayaran']); ?></td>
                <td>Rp. <?php echo number_format($data['uang_bayar']); ?></td>
                <td>Rp. <?php echo number_format($data['kembalian']); ?></td>
            </tr>
            <?php
                
            }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>
