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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
       <?php
       include "side.php";
       ?>
        <main class="main-content">
            <header class="header">
                <h1>Dashboard Admin</h1>
            </header>
            <section class="content user-dashboard">
                <div class="card">
                    <h3>Total Penjualan</h3>
                    <?php 
                        $total_pembayaran = mysqli_fetch_array(mysqli_query($db, "SELECT SUM(total_pembayaran) AS total FROM pembayaran"));
                        echo "<p>Total Pembayaran: RP. " . number_format($total_pembayaran['total'] ). "</p>";
                    ?>
                </div>
                <div class="card">
                    <h3>Pesanan</h3>
                    <?php echo "<p>Jumlah pesanan: " . mysqli_num_rows(mysqli_query($db, "SELECT * FROM pesanan")) . "</p>";?>
                </div>
                <div class="card">
                    <h3>Jumlah Menu</h3>    
                <?php echo "<p>Jumlah produk: " . mysqli_num_rows(mysqli_query($db, "SELECT * FROM produk")) . "</p>";?>

                </div>
                <div class="card">
                    <h3>Jumlah Transaksi</h3>
                  <?php  echo "<p>Jumlah Transaksi: " . mysqli_num_rows(mysqli_query($db, "SELECT * FROM pembayaran")) . "</p>"; ?>
                </div>
                <br>
                <br>
                


                <table>
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no=1;
                        $tampil=mysqli_query($db,"SELECT nama_produk,harga From produk ");
                        while($data=mysqli_fetch_array($tampil)){
                           
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td>Rp. <?php echo number_format($data['harga']); ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                
            </section>
        </main>
    </div>
</body>
</html>
