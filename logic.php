<?php
// Memulai sesi
session_start();
include "db.php";




if (isset($_GET['hapus_pesanan'])) {
    $id = $_GET['id'];

    $hapus = mysqli_query($db, "DELETE FROM pesanan WHERE id_pemesanan='$id'");

    if ($hapus) {
        // Pastikan untuk mengarahkan ke halaman pesanan setelah berhasil menghapus
        header('Location: pesanan.php');
        exit();
    } else {
        echo "Hapus data gagal";
    }
}

//tambah produk atau tambah menu//
if(isset($_POST['tambah_produk'])){
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = 0;
    $gambar = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi, "assets/img/".$gambar);
    mysqli_query($db, "INSERT INTO produk (nama_produk, harga,stok, gambar) VALUES('$nama_produk', '$harga','$stok','$gambar')");
   
}



if (isset($_GET['id_produk'])) {  // Ganti 'hapus_pesanan' dengan 'id_produk'
    $id_produk = $_GET['id_produk'];

    $hapus = mysqli_query($db, "DELETE FROM produk WHERE id_produk='$id_produk'");

    if ($hapus) {
        // Pastikan untuk mengarahkan ke halaman produk setelah berhasil menghapus
        header('Location: produk.php');
        exit();
    } else {
        echo "Hapus data gagal";
    }
}






$register_message = "";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    
    // Periksa apakah username sudah ada
    $check_username = "SELECT * FROM akun WHERE username = '$username'";
    $result = $db->query($check_username);
    
    if ($result->num_rows > 0) {
        $_SESSION['register_message'] = "Username sudah digunakan, silahkan pilih username lain";
        header("Location: register.php");
        exit();
    } else {
        $sql = "INSERT INTO akun (username, password, role) VALUES ('$username', '$password', 'user')";
        if ($db->query($sql)) {
            echo "<script>
            alert('Daftar akun Berhasil Silahkan Login');
            document.location='login.php';
            </script>";
        } else {
            echo "<script>
            alert('Daftar akun Gagal, silahkan coba lagi');
            document.location='register.php';
            </script>";
        }
    }
}


if(isset($_GET['id_pesanan'])) {
    $id_pesanan = $_GET['id_pesanan'];
    $tanggal_pembayaran = date('Y-m-d H:i:s');
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $total_pembayaran = $_POST['total_pembayaran'];

    $query = mysqli_query($db, "INSERT INTO pembayaran (id_pembayaran, tanggal_pembayaran, metode_pembayaran, total_pembayaran) VALUES ('$id_pesanan', '$tanggal_pembayaran', '$metode_pembayaran', '$total_pembayaran')");

    if($query) {
        echo "<script>
        alert('Pembayaran berhasil dilakukan');
        document.location='pesanan.php';
        </script>";
    } else {
        echo "<script>
        alert('Pembayaran gagal dilakukan');
        document.location='pesanan.php';
        </script>";
    }
}



// edit produk di admin
if(isset($_POST['ganti'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $lokasi = $_FILES['gambar']['tmp_name'];

    if(!empty($gambar)) {
        move_uploaded_file($lokasi, "assets/img/".$gambar);
        $query = mysqli_query($db, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', gambar='$gambar' WHERE id_produk='$id_produk'");
    } else {
        $query = mysqli_query($db, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga' WHERE id_produk='$id_produk'");
    }

    if($query) {
        echo "<script>
        alert('Data produk berhasil diubah');
        document.location='produk.php';
        </script>";
    } else {
        echo "<script>
        alert('Data produk gagal diubah');
        document.location='produk.php';
        </script>";
    }
}





// Memeriksa apakah form login telah disubmit
if(isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $cekuser = mysqli_query($db, "SELECT * FROM akun WHERE username='$username' AND password='$password'");
    $hitung = mysqli_num_rows($cekuser);

    if($hitung > 0) {
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = $ambildatarole['role'];

        $_SESSION['log'] = 'True';
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;

        if($role == "admin"){
            header("Location: index.php");
            exit();
        } elseif($role == "user"){
            header("Location: user.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Username atau password salah";
        header("Location: login.php");
        exit();
    }
}



      






       



        ?>

