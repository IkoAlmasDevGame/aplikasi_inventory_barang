<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ubah Data Gudang</title>
        <?php if ($_SESSION['user_akses'] == 'admin' && $_SESSION['level'] == 'admin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php require_once("../../../library/function.php"); ?>
        <?php $jumlah = 0; ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default bg-body-secondary container-fluid rounded-2 py-4">
            <div class="panel-heading py-2">
                <h4 class="panel-heading display-4 fs-3 text-dark fw-semibold fst-normal">
                    Ubah Data Gudang
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=gudang" aria-current="page" class="text-decoration-none text-primary">
                            Data Gudang
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?aksi=ubahgudang&kode_barang=<?= $_GET['kode_barang'] ?>" aria-current="page"
                            class="text-decoration-none active">
                            Ubah Data Gudang
                        </a>
                    </li>
                </div>
            </div>
            <div class="panel-body">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="col-sm col-sm-6 col-md col-md-6">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-2">
                                        <h4 class="card-title fs-4 fst-normal fw-semibold text-center display-4">
                                            Ubah Data Gudang
                                        </h4>
                                    </div>
                                    <div class="card-body my-2">
                                        <?php if (isset($_GET['kode_barang'])): ?>
                                        <?php $ress = $koneksi->query("SELECT * FROM gudang WHERE kode_barang = '$_GET[kode_barang]'") ?>
                                        <?php $tampil = mysqli_fetch_array($ress); ?>
                                        <form action="?aksi=ubah_gudang" role="form" method="post" class="form-group">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label form-check-label fs-4">
                                                            <label for="">Kode Barang</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <input type="text" name="kode_barang" class="form-control"
                                                            readonly value="<?= $tampil['kode_barang'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label form-check-label fs-4">
                                                            <label for="">Nama Barang</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <input type="text" class="form-control" name="nama_barang"
                                                            value="<?= $tampil['nama_barang'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label form-check-label fs-4">
                                                            <label for="">Jenis Barang</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <select name="jenis_barang" class="form-control">
                                                            <?php
                                                            $sql = $koneksi->query("select * from jenis_barang order by id");
                                                            while ($data = $sql->fetch_array()) {
                                                                $jenis = $tampil['jenis_barang'];
                                                                if ($data['jenis_barang'] == $jenis) {
                                                                    $cek = " selected";
                                                                } else {
                                                                    $cek = "";
                                                                }
                                                                echo "<option value='$data[id].$data[jenis_barang]' $cek>$data[jenis_barang]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label form-check-label fs-4">
                                                            <label for="">Satuan Barang</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <select name="satuan" class="form-control">
                                                            <?php
                                                            $sql = $koneksi->query("select * from satuan order by id");
                                                            while ($data = $sql->fetch_array()) {
                                                                $satuan = $tampil['satuan'];
                                                                if ($data['satuan'] == $satuan) {
                                                                    $cek = " selected";
                                                                } else {
                                                                    $cek = "";
                                                                }
                                                                echo "<option value='$data[id].$data[satuan]' $cek>$data[satuan]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer my-2">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-regular fa-save fa-1x"></i>
                                                        Update Data
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>