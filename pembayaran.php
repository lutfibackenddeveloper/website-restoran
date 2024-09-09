<?php
include "db.php";
session_start();

if (!isset($_SESSION['role'])) {
    header("location: login.php");
    exit();
}

$id_pemesanan = $_GET['id_pesanan'] ?? null;

if ($id_pemesanan) {
    $query = mysqli_query($db, "SELECT * FROM pesanan WHERE id_pemesanan='$id_pemesanan'");
    $pesanan = mysqli_fetch_assoc($query);
} else {
    echo "<script>alert('ID Pemesanan tidak valid.');</script>";
    echo "<script>location='pesanan.php';</script>";
    exit();
}

if (isset($_POST['konfirm'])) {
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $total_pembayaran = $pesanan['total_belanja'];
    $tanggal_pembayaran = date('Y-m-d H:i:s');
    $uang_bayar = $_POST['uang_bayar'] ?? null;

    if ($uang_bayar < $total_pembayaran) {
        echo "<script>Swal.fire({ icon: 'error', title: 'Pembayaran Gagal', text: 'Uang yang dibayarkan kurang dari total pembayaran.' });</script>";
    } else {
        $kembalian = $uang_bayar - $total_pembayaran;

        // Menangani error dengan try-catch
        try {
            $insert = mysqli_query($db, "INSERT INTO pembayaran (id_pembayaran, tanggal_pembayaran, metode_pembayaran, total_pembayaran, uang_bayar, kembalian) VALUES ('$id_pemesanan', '$tanggal_pembayaran', '$metode_pembayaran', '$total_pembayaran', '$uang_bayar', '$kembalian')");
            // Menghapus pesanan setelah pembayaran
            $hapus_pesanan = mysqli_query($db, "DELETE FROM pesanan WHERE id_pemesanan='$id_pemesanan'");
            echo "<script>Swal.fire({ icon: 'success', title: 'Pembayaran Berhasil', text: 'Kembalian: Rp. " . number_format($kembalian) . "' }).then(() => { window.location = 'pesanan.php'; });</script>";
        } catch (mysqli_sql_exception $e) {
            // Menampilkan alert jika pembayaran sudah dilakukan
            echo "<script>Swal.fire({ icon: 'warning', title: 'Pembayaran Sudah Dilakukan', text: 'Pembayaran untuk ID Pemesanan ini sudah ada.' });</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="assets/css/pembayaran.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<main class="container">
    <h1>Pembayaran</h1>
    <form method="POST" action="">
        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select name="metode_pembayaran" required>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="Kartu Kredit">Kartu Kredit</option>
            <option value="Cash">Cash</option>
        </select>
        <label for="uang_bayar">Uang Bayar:</label>
        <input type="number" name="uang_bayar" required>
        <p>Total Pembayaran: Rp. <?php echo number_format($pesanan['total_belanja']); ?></p>
        <button type="submit" name="konfirm">Konfirmasi Pembayaran</button>
    </form>
</main>

<script>
    <?php if (isset($_POST['konfirm'])): ?>
        <?php if ($uang_bayar < $total_pembayaran): ?>
            Swal.fire({
                icon: 'error',
                title: 'Pembayaran Gagal',
                text: 'Uang yang dibayarkan kurang dari total pembayaran.',
            });
        <?php else: ?>
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Berhasil',
                text: 'Pembayaran telah berhasil dilakukan. Kembalian: Rp. <?php echo number_format($kembalian); ?>',
            }).then(() => {
                window.location = 'pesanan.php';
            });
        <?php endif; ?>
    <?php endif; ?>
</script>
</body>
</html>