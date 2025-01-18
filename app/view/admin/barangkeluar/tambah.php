<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Barang Keluar</title>
        <?php if ($_SESSION['user_akses'] == 'admin' && $_SESSION['level'] == 'admin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php require_once("../../../library/function.php"); ?>
        <?php $tanggal_keluar = date("Y-m-d"); ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
        <script lang="javascript">
        function sum() {
            var stok = document.getElementById('stok').value;
            var jumlahkeluar = document.getElementById('jumlahkeluar').value;
            var result = parseInt(stok) - parseInt(jumlahkeluar);
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            }
        }
        </script>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default bg-body-secondary container-fluid rounded-2 py-4">
            <div class="panel-heading py-2">
                <h4 class="panel-heading display-4 fs-3 text-dark fw-semibold fst-normal">
                    Data Barang Masuk
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=barangkeluar" aria-current="page" class="text-decoration-none text-primary">
                            Data Barang Keluar
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?aksi=tambahbarangkeluar" aria-current="page" class="text-decoration-none active">
                            Tambah Barang Keluar
                        </a>
                    </li>
                </div>
            </div>
            <div class="panel-body py-2 m-3">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="col-sm-7 col-md-7">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-2">
                                        <h4 class="card-title fs-4 display-4 text-center fst-normal fw-semibold">
                                            Tambah Barang Masuk
                                        </h4>
                                    </div>
                                    <div class="card-body my-2">
                                        <form action="?aksi=tambah-barangkeluar" class="form-group" role="form"
                                            method="post">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="">Id
                                                            Transaksi</label>
                                                    </div>
                                                    <div class="col-sm-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input type="text" name="id_transaksi" class="form-control"
                                                            id="id_transaksi"
                                                            value="<?php echo buatKode('barang_keluar', 'id_transaksi', 'TRK-'); ?>"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="">Tanggal
                                                            Keluar</label>
                                                    </div>
                                                    <div class="col-sm-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input type="date" name="tanggal_keluar" class="form-control"
                                                            id="tanggal_keluar" value="<?php echo $tanggal_keluar; ?>"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="">Barang</label>
                                                    </div>
                                                    <div class="col-sm-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <select name="barang" id="cmb_barang" class="form-control" />
                                                        <option value="">-- Pilih Barang --</option>
                                                        <?php
                                                    $sql = $koneksi->query("select * from gudang order by kode_barang");
                                                    while ($data = $sql->fetch_assoc()) {
                                                        echo "<option value='$data[kode_barang].$data[nama_barang]'>$data[kode_barang] | $data[nama_barang]</option>";
                                                    }
                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="tampung"></div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="">Jumlah</label>
                                                    </div>
                                                    <div class="col-sm-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input type="text" name="jumlahkeluar" id="jumlahkeluar"
                                                            onkeyup="sum()" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="">Total
                                                            Stok</label>
                                                    </div>
                                                    <div class="col-sm-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input readonly="readonly" name="total" id="total" type="number"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="tampung1"></div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="">Tujuan</label>
                                                    </div>
                                                    <div class="col-sm-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input type="text" name="tujuan" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer my-2">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-regular fa-save fa-1x"></i>
                                                        Simpan Data
                                                    </button>
                                                    <a href="?page=barangkeluar" aria-current="page">
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
        <?php require_once("../ui/footer.php") ?>