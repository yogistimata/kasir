<?php

session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'kasir');

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$check = mysqli_query ($koneksi, "SLECT * FROM user Where username='$username' AND password='password' ");
$hitung = mysqli_num_rows($check);

if($hitung > 0){
$_SESSION['login']= true;
header ('location:index.php');
}else echo' 
<script> alert ("username atau password salah")
window.location.herf= "login.php"
</script>';
}

if (isset($_POST['tambahproduk'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $insert_produk = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, deskripsi, harga, stok) values ('$nama_produk', '$deskripsi', '$harga', '$stok')");

    if($insert_produk){
    header ('location:stok.php');
   
}else 
echo' 
<script> alert ("hayoo salah")
window.location.herf= "login.php"
</script>';
}



?>