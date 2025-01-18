<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Gudang</title>
    <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
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
                Tambah Data Gudang
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
                    <a href="?aksi=tambahgudang" aria-current="page" class="text-decoration-none active">
                        Tambah Data Gudang
                    </a>
                </li>
            </div>
        </div>
        <div class="panel-body">
            <section class="content">
                <div class="content-wrapper">
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="col-sm col-sm-5 col-md col-md-5">
                            <div class="card shadow mb-3">
                                <div class="card-header py-2">
                                    <h4 class="card-title text-center text-dark fs-4
                                             display-3 fw-semibold fst-normal">
                                        Tambah Data Gudang
                                    </h4>
                                </div>
                                <div class="card-body my-2">
                                    <form action="?aksi=tambah_gudang" class="form-group" role="form" method="post">
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                    <label for="">Kode Barang</label>
                                                </div>
                                                <div class="col-sm col-sm-1">:</div>
                                                <div class="col-sm col-sm-6 col-md col-md-6">
                                                    <input type="text" name="kode_barang" class="form-control"
                                                        id="kode_barang"
                                                        value="<?= buatKode('gudang', 'kode_barang', 'BAR-') ?>"
                                                        readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                    <label for="">Nama Barang</label>
                                                </div>
                                                <div class="col-sm col-sm-1">:</div>
                                                <div class="col-sm col-sm-6 col-md col-md-6">
                                                    <input type="text" name="nama_barang" class="form-control"
                                                        maxlength="100" placeholder="masukkan nama barang ...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                    <label for="">Jenis Barang</label>
                                                </div>
                                                <div class="col-sm col-sm-1">:</div>
                                                <div class="col-sm col-sm-6 col-md col-md-6">
                                                    <select name="jenis_barang" class="form-control" />
                                                    <option value="">-- Pilih Jenis Barang --</option>
                                                    <?php
                                                    $sql = $koneksi->query("select * from jenis_barang order by id");
                                                    while ($data = $sql->fetch_assoc()) {
                                                        echo "<option value='$data[id].$data[jenis_barang]'>$data[jenis_barang]</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                    <label for="">Jumlah</label>
                                                </div>
                                                <div class="col-sm col-sm-1">:</div>
                                                <div class="col-sm col-sm-6 col-md col-md-6">
                                                    <input type="text" name="jumlah" class="form-control"
                                                        id="jumlah" value="<?php echo $jumlah; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                    <label for="">Satuan Barang</label>
                                                </div>
                                                <div class="col-sm col-sm-1">:</div>
                                                <div class="col-sm col-sm-6 col-md col-md-6">
                                                    <select name="satuan" class="form-control">
                                                        <option value="">-- Pilih Satuan Barang --</option>
                                                        <?php
                                                        $sql = $koneksi->query("select * from satuan order by id");
                                                        while ($data = $sql->fetch_assoc()) {
                                                            echo "<option value='$data[id].$data[satuan]'>$data[satuan]</option>";
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
                                                    Simpan Data
                                                </button>
                                                <a href="?page=gudang" aria-current="page">
                                                    <button type="button" class="btn btn-default btn-outline-dark">
                                                        <i class="fa fa-fw fa-close fa-1x"></i>
                                                        Kembali Halaman
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php require_once('../ui/footer.php') ?>