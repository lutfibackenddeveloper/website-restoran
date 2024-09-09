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
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="assets/css/pesanan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include "side.php";
?>
<main class="container">
    <h1>Daftar Pesanan</h1>
    <table class="order-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Id_Pemesanan</th>
                <th>Tanggal Pemesanan</th>
                <th>Total Bayar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php 
            $ambil = mysqli_query($db, 'SELECT * FROM pesanan');
            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
          ?>
          <?php foreach($result as $result) : ?>

          <tr>
            <th scope="row"><?php echo $nomor; ?></th>
            <td><?php echo $result["id_pemesanan"]; ?></td>
            <td><?php echo $result["tanggal_pemesanan"]; ?></td>
            <td>Rp. <?php echo number_format($result["total_belanja"]); ?></td>
            <td>
              
              <a href="detail_pesanan.php?id=<?php echo $result['id_pemesanan'] ?>">
                  <button class="detail">
                      <i class="fas fa-info-circle"></i> Detail <!-- Menambahkan icon detail -->
                  </button>
              </a>


              <a href="logic.php?hapus_pesanan=true&id=<?php echo $result['id_pemesanan'] ?>" name="hapus_pesanan">
                <button class="hapus">
                    <i class="fas fa-trash"></i> Hapus data <!-- Menambahkan icon hapus -->
                </button>
              
              </a>
            

              <a href="pembayaran.php?id_pesanan=<?php echo $result['id_pemesanan'] ?>" >
                
                  <button class="bayar">
                      <i class="fas fa-credit-card"></i> Bayar <!-- Menambahkan icon bayar -->
                  </button>
              </a>


            </td>
          </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>
</html>
