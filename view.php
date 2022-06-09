<?php
require 'funcition.php';


if (isset($_GET['idp'])){
    $idp = $_GET['idp']

    $ambilmanapelanggan
    $np = mysqli_fetch_arry($ambilmanapelanggan);
    $namapel = $np['nama_pelanggan'];
    $idp =$np['id_pelanggan'];
}else { header ('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi Kasir</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="stok.php">
                                <div class="sb-nav-link-icon"><i class="fab fa-apple"></i></div>
                                Stok barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                               Barang masuk
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                               kelola pelanggan
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                          
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                   
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">data pesanan : <? $idp; ?></h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                tambah pesanan
                                </button>
                                <div class="container mt-3">
                                
                                </div>
                            </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data stok
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nama produk</th>
                                            <th>harga satuan</th>
                                            <th>jumlah</th>
                                            <th>sub-toltal</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <tr>
                                        <?php
                                        $get= mysqli_query($koneksi,
                                        "SELECT * FROM detail_pesanan p, produk pr WHERE p.id_produk=pr.id_produk AND id_pesanan='$idp'AND id_pelanggan");
                                        $i=1;
                                        while($ps = mysqli_fetch_arry($get))
                                        $idp = $ps['id_produk'];
                                        $iddetail = $ps['id_detailpesanan'];
                                        $idp = $ps['id_pesanan'];
                                        $qty = $ps['qty'];
                                        $harga = $ps['harga'];
                                        $namaproduk = $ps['nama_produk'];
                                        $deskripsi = $ps['deskripsi'];
                                        $subtotal = $qty*$harga;
                                            ?> 
                                            <td><?= $i++?></td>
                                            <td><?= $nama_produk;?>(<? $deskipsi;?>)</td>
                                            <td><?= $harga;?></td>
                                            <td><?= $qty;?></td>
                                            <td><?= $subtotal;?></td>
                                            <td>edit <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delet<?= $idpr;?>">
                                            delet
                                </button></td>
                                        
                                        </tr>
                                      <?php 
                                      };
                                      ?>
                                    <div class="modal" id="#delet<?= $idpr;?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">hapus data pesanan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <from method="POST">
      <!-- Modal body -->
    <div class="modal-body" class="form-control">
          hapus barang
        <input class="form-control mt-3" type="hidden" name="idp" velue="<?= $ps['id_produk']; ?>"
        <input class="form-control mt-3" type="text" name="idpr" velue="<?= $ps['id_detailpesanan']; ?>"
        <input class="form-control mt-3" type="text" name="iddetail" velue="<?=$ps['id_pesanan']; ?>"
        <input class="form-control mt-3" type="num" name="iddetail" velue="<?= $ps['harga']; ?>"
        <input class="form-control mt-3" type="text" name="iddetail" velue="<?=$ps['setok']; ?>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="edit">hapus</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>
      </from>
    </div>
  </div>
</div>
</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Yogi sasmita</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <from method="POST">
      <!-- Modal body -->
      <div class="modal-body" class="form-control">
          pilih barang
          <select name="id_prduk">
          <?php
          $getproduk = mysqli_query($koneksi, "SELECT * FROM produk");

          while($pl=mysqli_fetch_arry($getproduk)){
              $id_produk = $pl['id_produk'];
              $nama_produk = $pl['nama_produk'];
              $stok = $pl['stol'];
              $deskipsi = $pl['deskripsi'];
              ?>
              <option value="<?= $id_produk;?>"><?= $nama_produk;?><?= $deskipsi?>
            </option>
              <?php
          }         
          ?>
          </select>
          <input class="form-control mt-3" type="number" name="qty" placeholder="quantity">
          <input class="form-control mt-3" type="hidden" name="idp" velue="<?= $idp; ?>"
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="addproduk">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>
      </from>
    </div>
  </div>
</div>

</html>