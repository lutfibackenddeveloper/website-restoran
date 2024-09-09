<?php
    include "db.php";
    session_start();

    if(!isset($_SESSION['role'])) {
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/menu_user.css">
    <title>Halaman Menu</title>
</head>
<body>

<header>
            <div class="atas">
                <img class="bg-user" src="assets/img/bg2.webp">
            <div class="text-on-image">
                <h1 class="">Selamat Datang</h1>
                <p class=""><?=$_SESSION['username']?></p>
            </div>
                
                
            </div>
        </header>
        <!-- Navbar -->
        <nav class="navbar">
            <ul>    
                <li class="item">
                    <a href="user.php">Dashboard</a>
                </li>
                <li class="item">
                    <a href="menu_user.php">Menu Pesanan</a>
                </li>
                <li class="item">
                    <a href="pesanan_user.php">Pesanan Anda</a>
                </li>
                <li class="item">
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>   
    <!-- Menampilkan data produk dalam tabel -->
    <div class="content user-dashboard">
     <?php

$produk = mysqli_query($db, "SELECT * FROM produk");
while($row = mysqli_fetch_array($produk)) {
    echo "<div class='card'>";
    echo "<p>Nama: " . $row['nama_produk'] . "</p>";
    echo "<p>Nama: " .number_format($row['harga'])  . "</p>";
    echo "<img src='assets/img/" . $row['gambar'] . "' alt='Produk'>";
    echo "<a href='beli.php?id_produk=" . $row['id_produk'] . "' class='beli-btn'>Beli</a>";
    echo "</div>";
}

?>

</div>
</body>
</html>
