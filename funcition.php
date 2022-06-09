 <?php

session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'kasir');

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$check = mysqli_query ($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password' ");
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

    $insert_produk = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, deskripsi, harga, stok) VALUES('$nama_produk', '$deskripsi', '$harga', '$stok')");

    if($insert_produk){
        header ('location:stok.php');
   
}else 
echo' 
<script> alert ("hayoo salah")
window.location.herf= "stok.php"
</script>';
}

if (isset($_POST['addproduk'])) {
    $id_produk = $_POST['id_produk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty'];


    $hitung1 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='id_produk'" );
    $hitung2 = mysqli_fetch_arry('$hitung1');
    $stoksekarang = $hitung2['$stok'];

    $insert = mysqli_query($koneksi, "INSERT INTO detai_pesanan (id_pesanan, id_produk, qty) VALUES('$idp', '$id_produk', '$qty')");

    if($stoksekarang >= $qty){
        $selisih = $stoksekarang - $qty;
        $insert = mysqli_query($koneksi, "INSERT INTO detai_pesanan (id_pesanan, id_produk, qty) VALUES('$idp', '$id_produk', '$qty')");
        $updete = mysqli_query($koneksi, "UPDATE produk SET stok='$hitung' WHERE id_produk = '$idpr'");

        if($inser&&$updet)
        header ('location:view.php?$idp=' .$idp);
   
}else 
echo' 
<script> alert ("hayoo salah pelanggan")
window.location.herf= "view.php" '. $idp . '
</script>';
}
if (isset($_POST['addproduk'])) {
    $id_produk = $_POST['id_produk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty'];
     
    $hitung1 = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$id_produk'");
    $hitung2 = mysqli_fetch_arry($hitung1);
    $stokskarang = $hitung2['stok'];

    if($stoksekarang >=$qty){
        $selisih = $stoksekarang-$qty;

        $insert = mysqli_query($koneksi, "INSERT INTO detai_pesanan (id_pesanan, id_produk, qty) VALUES('$idp', '$id_produk', '$qty')");

        $updet = mysqli_query($koneksi,"UPDATE produk SET stok='$selisih'WHERE id_produk='$id_produk'");


        $updete = mysqli_query($koneksi, "UPDATE produk SET stok='$hitung' WHERE id_produk = '$idpr'");

        if($inser&&$updet)
        header ('location:view.php?$idp=' .$idp);
   
}else 
echo' 
<script> alert ("hayoo salah pelanggan")
window.location.herf= "view.php" '. $idp . '
</script>';


    $insertbar = mysqli_query($koneksi," INSERT INTO masuk ($id_produk,$qty) VALUES ($id_produk,qty)");

    if (insertbar){

        header ('location:masuk.php');
    }else{
        echo' 
        <script> alert (" salah ")
        window.location.herf= "masuk.php" '. $idp . '
        </script>'; 
    }

}

if (isset($_POST['hapusdetail'])){
    $iddetail = $_POST['iddetail'];
    $idpr = $_POST['idpr'];
    $idp = $_POST['idp'];

    $cek1 = mysqli_query($koneksi,"SELECT * FROM detail_pesanan WHERE id_detailpesanan='$iddetail'");
    $cek2 = mysqli_fetch_arry($cek1);
    $qtystoksekarang = $cek2['qty'];

    $cek3 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk= '$idpr'");
    $cek4 = mysqli_fetch_arry($cek3);
    $stoksekrang = $cek4['stok'];

    $hitung = $stoksekarang+$qtysekarang;
    $updete = mysqli_query($koneksi, "UPDATE produk SET stok='$hitung' WHERE id_produk = '$idpr'");
    $hapus = mysqli_query($koneksi, "Delet from detail pesanan WHERE id_produk= '$idpr' AND id_detailpesanan= '$iddetail'" );

    if($updet&&$hapus){
        header ('location:view.php?$idp=' .$idp);
    }else{
        echo' 
<script> alert ("hayoo salah pelanggan")
window.location.herf= "view.php" '. $idp . '
</script>';
    }


}
if(isset($_POST['edit'])){
    $np = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $idpr = $_POST['id_produk'];

    $edit_barang = mysqli_query($koneksi,"UPDATE produk SET nama_produk='$np', deskpsi='$deskripsi', harga='$harga' WHERE id_produk='$idpr'");
if($edit_barang)

header ('location:stok.php');
}else{
    echo' 
    <script> alert (" salah ")
    window.location.herf= "stok.php" s
    </script>';
}


if(isset($_POST['hapusproduk'])){
    $idpr = $_POST['id_produk'];

    $hapusbarang = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$idpr'");

    if($hapusbarang){
        eader ('location:stok.php');
}else{
    echo' 
    <script> alert (" salah ")
    window.location.herf= "stok.php" s
    </script>';
}
    }



    if(isset($_POST['id_pelanggan'])){
        $id_pelanggan = $_POST['id_pelanggan'];
    
        $hapuspelanggan = mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    
        if($hapuspelanggan){
            eader ('location:pelanggan.php');
    }else{
        echo' 
        <script> alert (" salah ")
        window.location.herf= "pelanggan.php" s
        </script>';
    }
        }


        
if(isset($_POST['editpelanggan'])){
    $nama_pelanggan = $_POST['nama_pelannggan'];
    $notelp = $_POST['notelep'];
    $alamat = $_POST['alamat'];
    $id_pelanggan = $_POST['id_pelanggan'];

    $edit_pelanggan = mysqli_query($koneksi,"UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', notelp='$telep', alamat='alamat' WHERE id_pelanggan='$id_pelanggan'");
if($edit_barang)

header ('location:pelanggan.php');
}else{
    echo' 
    <script> alert (" salah ")
    window.location.herf= "pelanggan.php" s
    </script>';
}

?>