<?php 
    require "../functions.php";
    if(isset($_POST['submit'])) {
        if(tambahmenu($_POST) > 0) {
            echo "<script>
                    alert('Menu berhasil ditambahkan');
                  </script>";
        } else {
            echo "<script>
                    alert('Menu gagal ditambahkan');
                  </script>";
        }
    }

    $menus = ambil("SELECT * FROM menu");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/styleku.css">
    <style>
        table input {
            width: 100%;
        }
        * {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets/images/logo/logo1.png" alt="Logo" srcset="">
                                <h3 style="float: right;margin-top: 17px;margin-left: 5px;font-size: 22px;">SATU RASA</h3>
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="daftarakun.php" class='sidebar-link'>
                                <i class="bi bi-file-person-fill"></i>
                                <span>Data Pengunjung</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="daftarpenjualan.html" class='sidebar-link'>
                                <i class="bi bi-receipt-cutoff"></i>
                                <span>Daftar Penjualan</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
                            <a href="stokbarang.html" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>
                                <span>Stok Barang</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="laporankeuangan.php" class='sidebar-link'>
                                <i class="bi bi-calculator"></i>
                                <span>Laporan Keuangan</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Tambah Barang</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="width: 137%;">
                                    <div class="card-header card-header-tabel">
                                        <h4>Tambah Barang</h4>
                                    </div>
                                    <div class="card-body kartu-tabel">
                                        <table width="100%" cellspacing="0" cellpadding="5" class="tabelku">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <tr class="tr">
                                                <th class="td">Nama Produk</th>
                                                <th class="td">Varian Produk</th>
                                                <th class="td">Harga</th>
                                                <th class="td">Stok</th>
                                                <th class="td">Gambar</th>
                                                <th rowspan="2"><button style="color: whitesmoke;border:none;font-weight:bold;" class="tomboltabel" type="submit" name="submit">Tambah</button></th>
                                            </tr>
                                            <tr class="tr">
                                                <td class="td"><input name="nama1" style="width: 100%;" type="text"></td>
                                                <td class="td"><input name="nama2" type="text"></td>
                                                <td class="td"><input name="harga" type="text"></td>
                                                <td class="td"><input name="stok" style="width: 50px;text-align:center;" type="text"></td>
                                                <td class="td"><input name="gambar" style="width: 100px;" type="file"></td>
                                            </tr>
                                        </form>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>

            <div class="page-heading">
                <h3>Stok Barang</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="width: 137%;">
                                    <div class="card-header card-header-tabel">
                                        <h4>Daftar Barang</h4>
                                    </div>
                                    <div class="card-body kartu-tabel">
                                        <table width="100%" cellspacing="0" cellpadding="5" class="tabelku">
                                            <tr class="tr">
                                                <th class="td">ID</th>
                                                <th class="td">Nama Produk</th>
                                                <th class="td">Varian Produk</th>
                                                <th class="td">Stok Tersedia</th>
                                                <th>Hapus</th>
                                            </tr>
                                            <?php foreach($menus as $menu) : ?>
                                            <tr class="tr">
                                                <td class="td"><?php echo $menu['id']; ?></td>
                                                <td class="td"><?php echo $menu['nama1']; ?></td>
                                                <td class="td"><?php echo $menu['nama2']; ?></th>
                                                <td class="td"><?php echo $menu['stok']; ?></td>
                                                <td class="td"><button style="background-color:salmon;color: whitesmoke;border:none;font-weight:bold;" class="tomboltabel"><a onclick="return confirm('Yakin?')" href="hapus.php?id=<?php echo $menu['id']; ?>">Hapus</a></button></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>
            


            <footer>
                <div class="footer clearfix mb-0 text-muted">
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>