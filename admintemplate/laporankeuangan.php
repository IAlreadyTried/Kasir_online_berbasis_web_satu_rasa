<?php 
    require_once "../functions.php";

    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $waktu = $date->format('d-m-Y');
    $kemarin = date('d-m-Y', strtotime($waktu . '-1 day'));
    // echo $kemarin;

    $cekdulu = ambil("SELECT tanggal FROM laporan where tanggal = '$kemarin'");
    $cekdulu = mysqli_affected_rows($conn);
    if($cekdulu < 1) {
        // echo "<h1>" . $cekdulu."</h1>";
        $transaksinya = ambil("SELECT * FROM transaksi WHERE waktu LIKE '$kemarin%'");
        // echo "<h1>" . var_dump($transaksinya)."</h1>";

        // Menjumlahkan pemasukan harian
        $jumlahPemasukan = 0;
        foreach($transaksinya as $trs) {
            $jumlahPemasukan += $trs['total'];
        }
        // echo "<h1>" . $jumlahPemasukan."</h1>";

        // Masukkan kedalam database
        mysqli_query($conn, "INSERT INTO laporan VALUES ('', '$kemarin', '$jumlahPemasukan')");
    }
    $laporannya = ambil("SELECT * FROM laporan");
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
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html">
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
                            <a href="index.php" class='sidebar-link'>
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
                            <a href="daftarpenjualan.php" class='sidebar-link'>
                                <i class="bi bi-receipt-cutoff"></i>
                                <span>Daftar Penjualan</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="stokbarang.php" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>
                                <span>Stok Barang</span>
                            </a>
                        </li>

                        <li class="sidebar-item  active">
                            <a href="laporankeuangan.html" class='sidebar-link'>
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
                <h3>Laporan Keuangan</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="width: 137%;">
                                    <div class="card-header card-header-tabel">
                                        <h4>Laporan</h4>
                                    </div>
                                    <div class="card-body kartu-tabel">
                                        <table width="100%" cellspacing="0" cellpadding="5" class="tabelku">
                                            <tr class="tr">
                                                <th class="td">ID</th>
                                                <th class="td">Tanggal</th>
                                                <th class="td">Total Pendapatan Harian</th>
                                            </tr>
                                            <?php foreach($laporannya as $lpr): ?>
                                            <tr class="tr">
                                                <td class="td"><?= $lpr['id']; ?></td>
                                                <td class="td"><?= $lpr['tanggal']; ?></td>
                                                <td class="td">Rp. <?= $lpr['pendapatan']; ?>,00-</td>
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