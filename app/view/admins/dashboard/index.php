<?php require_once("../ui/header.php") ?>
<?php require_once("../ui/sidebar.php") ?>
<?php
# table supplier
$sup = $koneksi->query("SELECT COUNT(kode_supplier) as supplier FROM tb_supplier");
$supplier = mysqli_fetch_array($sup);
# table users
$user = $koneksi->query("SELECT COUNT(id) as users FROM users");
$users = mysqli_fetch_array($user);
# table gudang
$gudang = $koneksi->query("SELECT COUNT(kode_barang) as gudang FROM gudang");
$building = mysqli_fetch_array($gudang);
# table Barang Masuk
$in = $koneksi->query("SELECT COUNT(id_transaksi) as transaksi FROM barang_masuk");
$barangmasuk = mysqli_fetch_array($in);
# table Barang Keluar
$out = $koneksi->query("SELECT COUNT(id_transaksi) as transaksi FROM barang_keluar");
$barangkeluar = mysqli_fetch_array($out);
?>
<!-- Layout Body Beranda -->
<section class="content">
    <div class="content-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="display-3 fs-3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <marquee behavior="scroll" scrollamount="15" direction="left">
            <h2 class="fs-2 display-2 fw-normal fst-normal">Selamat Datang di Aplikasi Informasi Inventory Barang</h2>
        </marquee>
        <div class="d-flex justify-content-start align-items-center flex-wrap gap-1 mt-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left border-primary shadow py-2" style="height: 120px; max-height: 100%;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <a href="?page=pengguna">
                                    <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                                        <h4>Data Users</h4>
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-black-50"></i>
                                <br>
                                <div class="text-center">
                                    <div class="fs-1 display-1 fst-normal fw-normal">
                                        <?php echo $users['users'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left border-info shadow py-2" style="height: 120px; max-height: 100%;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <a href="?page=supplier">
                                    <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                                        <h4>Data Supplier</h4>
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">

                                        </div>
                                        <div class="col">

                                        </div>
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-black-50"></i>
                                <br>
                                <div class="text-center">
                                    <div class="fs-1 display-1 fst-normal fw-normal">
                                        <?php echo $supplier['supplier'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left border-info shadow py-2" style="height: 120px; max-height: 100%;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <a href="?page=gudang">
                                    <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                                        <h4>Data Gudang</h4>
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">

                                        </div>
                                        <div class="col">

                                        </div>
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-black-50"></i>
                                <br>
                                <div class="text-center">
                                    <div class="fs-1 display-1 fst-normal fw-normal">
                                        <?php echo $building['gudang'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left border-info shadow py-2" style="height: 120px; max-height: 100%;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <a href="?page=barangmasuk">
                                    <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                                        <h4>Barang Masuk</h4>
                                    </div>

                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-black-50"></i>
                                <br>
                                <div class="text-center">
                                    <div class="fs-1 display-1 fst-normal fw-normal">
                                        <?php echo $barangmasuk['transaksi'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left border-info shadow py-2" style="height: 120px; max-height: 100%;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <a href="?page=barangkeluar">
                                    <div class="fs-6 fw-bold text-primary text-uppercase mb-1">
                                        <h4>Barang Keluar</h4>
                                    </div>

                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-black-50"></i>
                                <br>
                                <div class="text-center">
                                    <div class="fs-1 display-1 fst-normal fw-normal">
                                        <?php echo $barangkeluar['transaksi'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Layout Body Beranda -->
<?php require_once("../ui/footer.php") ?>