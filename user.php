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
    <link rel="stylesheet" href="assets/css/user.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
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
                    <a href="">Pesanan Anda</a>
                </li>
                <li class="item">
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>

            <!-- AKHIR DARI NAVBAR -->

        <div class="content">

           <table>
                <thead>
                    <th>NO</th>
                    <th>Menu</th>
                    <th>Harga</th>
                </thead>
                <tbody>
                <?php
        $no=1;
        $menu = mysqli_query($db, "SELECT nama_produk , harga FROM produk");
        while($tampil= mysqli_fetch_array($menu)): ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$tampil['nama_produk']?></td>
                        <td>RP. <?=number_format($tampil['harga'])?></td>
                    
                    </tr>
                    <?php endwhile; ?> 
                </tbody>
                
           </table>
</body>
</html>