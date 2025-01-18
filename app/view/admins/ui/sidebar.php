<?php
if ($_SESSION['user_akses'] == '' && $_SESSION['level'] == '') {
    header("location:../../index.php");
}
?>

<?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
<?php require_once("../../../config/config.php"); ?>
<?php
    $baseFiles = $koneksi->query("SELECT * FROM users WHERE id = '$_SESSION[superadmin]' and level = '$_SESSION[level]'");
    $baseFile = mysqli_fetch_array($baseFiles);
    ?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fs-5 fst-normal fw-semibold">
            <?php echo "$setting[nama]"; ?>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul class="d-flex justify-content-center align-items-center mx-auto">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link d-flex align-items-center pe-0" href="#" role="button" data-bs-toggle="dropdown"
                    aria-controls="dropdown">
                    <i class="fa fa-regular fa-calendar fa-2x"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <?php require_once("../ui/calendar.php") ?>
                </ul>
            </li>
            <li class="nav-item dropdown pe-4">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <?php $dir = __DIR__ . "../../../../assets/default/user_logo.png"; ?>
                    <?php if ($baseFile['foto'] != $dir) { ?>
                    <img src="../../../../assets/foto/<?= $baseFile['foto'] ?>" class="img-responsive rounded-2"
                        style="width: 25px; max-width: 100%;" alt="<?= $baseFile['foto'] ?>">
                    <?php } else { ?>
                    <img src="<?php echo $dir; ?>" class="img-responsive rounded-2"
                        style="width: 25px; max-width: 100%;" alt="user_logo.png">
                    <?php } ?>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a>
                <!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h4 class="fs-6 fw-normal text-start text-dark">
                            <div class="form-inline row justify-content-start align-items-start flex-wrap my-2">
                                <div class="col-sm-4 col-md-4">
                                    <label for="">username</label>
                                </div>
                                <div class="col-sm-1 col-md-1">:</div>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $baseFile['username']; ?>
                                </div>
                            </div>
                        </h4>
                        <hr class="dropdown-divider">
                        <h4 class="fs-6 fw-normal text-start text-dark">
                            <div class="form-inline row justify-content-start align-items-start flex-wrap my-2">
                                <div class="col-sm-4 col-md-4">
                                    <label for="">nama profile</label>
                                </div>
                                <div class="col-sm-1 col-md-1">:</div>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $baseFile['nama']; ?>
                                </div>
                            </div>
                        </h4>
                        <hr class="dropdown-divider">
                        <h4 class="fs-6 fw-normal text-start text-dark">
                            <div class="form-inline row justify-content-start align-items-start flex-wrap my-2">
                                <div class="col-sm-4 col-md-4">
                                    <label for="">nik</label>
                                </div>
                                <div class="col-sm-1 col-md-1">:</div>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $baseFile['nik']; ?>
                                </div>
                            </div>
                        </h4>
                        <hr class="dropdown-divider">
                        <h4 class="fs-6 fw-normal text-start text-dark">
                            <div class="form-inline row justify-content-start align-items-start flex-wrap my-2">
                                <div class="col-sm-4 col-md-4">
                                    <label for="">Jabatan</label>
                                </div>
                                <div class="col-sm-1 col-md-1">:</div>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $baseFile['level'] ?>
                                </div>
                            </div>
                        </h4>
                        <hr class="dropdown-divider my-2">
                        <div class="text-center">
                            <a href="?page=setting&id=1" class="btn btn-sm btn-info mx-2">
                                <i class="fas fa-fw fa-building fa-1x"></i>
                                Profile Website
                            </a>
                            <a href="?page=user-profile&id=<?= $_SESSION['superadmin'] ?>"
                                class="btn btn-sm btn-success mx-2">
                                <i class="fas fa-fw fa-user fa-1x"></i>
                                Profile
                            </a>
                            <a href="?page=logout"
                                onclick="return confirm('Apakah anda ingin keluar dari website ini ?')"
                                aria-current="page" class="btn btn-sm btn-danger mx-1">
                                <i class="fas fa-fw fa-sign-out-alt fa-1x"></i>
                                Log Out
                            </a>
                        </div>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header>
<!-- ======= Header ======= -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" style="background: rgba(100, 107, 107, 1);" class="sidebar overflow-auto">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a href="?page=beranda" aria-current="page" class="nav-link collapsed">
                <i class="fas fa-tachometer-alt fa-1x"></i>
                <div class="fs-6 display-4 text-dark fw-normal">Dashboard</div>
            </a>
        </li>
        <hr class="border border-top border-light">
        <li class="nav-item">
            <a href="?page=pengguna" aria-current="page" class="nav-link collapsed">
                <i class="fas fa-fw fa-user-alt fa-1x"></i>
                <di class="fs-6 display-4 text-dark fw-normal">Data Pengguna</di v>
            </a>
        </li>
        <hr class="border border-top border-light">
        <li class="nav-item">
            <a href="#" data-bs-target="#master-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i>
                <div class="fs-6 display-4 text-dark fw-normal">Data Master</div>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="master-nav" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a href="?page=gudang" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal hover-text">Data Barang</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=jenisbarang" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal">Jenis Barang</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=satuan" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal">Satuan Barang</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=supplier" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal hover">Data Supplier</div>
                    </a>
                </li>
            </ul>
        </li>
        <hr class="border border-top border-light">
        <li class="nav-item">
            <a href="#" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i>
                <div class="fs-6 display-4 text-dark fw-normal">Transaksi</div>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="transaksi-nav" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a href="?page=barangmasuk" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal hover-text">Barang Masuk</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=barangkeluar" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal">Barang Keluar</div>
                    </a>
                </li>
            </ul>
        </li>
        <hr class="border border-top border-light">
        <li class="nav-item">
            <a href="#" data-bs-target="#laporan-nav" data-bs-toggle="collapse" class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i>
                <div class="fs-6 display-4 text-dark fw-normal">Laporan export Excel</div>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="laporan-nav" data-bs-parent="#sidebar-nav">
                <h6 class="collapse-header text-white">Menu Laporan:</h6>
                <li class="nav-item">
                    <a href="?page=laporan_supplier" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal hover-text">Laporan Supplier</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=laporan_gudang" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal">Laporan Stok Gudang</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=laporan_barangmasuk" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal">Laporan Barang Masuk</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=laporan_barangkeluar" class="nav-link" aria-current="page">
                        <i class="fa-regular fa-circle fa-fw fa-1x"></i>
                        <div class="fs-6 display-4 fw-normal">Laporan Barang Keluar</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- ======= Sidebar ======= -->
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>
    <?php else: ?>
    <?php header("location:../../index.php"); ?>
    <?php exit(0); ?>
    <?php endif; ?>