<?php
$hostname ="localhost";
$username = "root";
$password = "";
$database = "webb";

$db =mysqli_connect($hostname,$username,$password,$database);
if(!$db){
    die("Koneksi Gagal terhubung".mysqli_connect_error());

}
