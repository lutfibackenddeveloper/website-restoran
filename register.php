<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div class="card">
    <form method="POST" action="logic.php">
        <h1>Daftar Akun Anda</h1>
            <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="text" placeholder="username" name="username" required>
            </div>

            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="password" required>
            </div>



            <?php
            if (isset($_SESSION['register_message'])) {
                echo "<p style='color:red;'>".$_SESSION['register_message']."</p>";
                unset($_SESSION['register_message']);
            }
            ?>
              <button class ="btn" type="submit" name="register">Daftar sekarang</button>
              <br>
            <button onclick="location.href='login.php'" class="btn-login_kembali"><a>Kembali login</a></button>
          
    </form>
</div>
</body>
</html>