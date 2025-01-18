<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Barang Masuk</title>
        <?php if ($_SESSION['user_akses'] == 'admin' && $_SESSION['level'] == 'admin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
        <style type="text/css">
        .table {
            width: 1024px;
        }

        @media (min-width:1200px) {
            .table {
                min-width: 1200px;
            }
        }
        </style>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default bg-body-secondary container-fluid rounded-2 py-4">
            <div class="panel-heading py-2">
                <h4 class="panel-heading display-4 fs-3 text-dark fw-semibold fst-normal">
                    Laporan Barang Masuk
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=laporan_barangmasuk" aria-current="page" class="text-decoration-none active">
                            Laporan Barang Masuk
                        </a>
                    </li>
                </div>
            </div>
            <div class="panel-body">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="card shadow mb-3">
                            <div class="card-header py-2">
                                <h4 class="card-title fs-4 display-4 fst-normal fw-semibold text-dark">
                                    Laporan Barang Masuk
                                </h4>
                            </div>
                            <div class="card-body my-2">
                                <div class="card-tools">
                                    <div class="text-start">
                                        <a href="?page=laporan_barangmasuk" aria-current="page">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa ga-regular fa-refresh fa-1x fa-fw"></i>
                                                Muat Halaman Ulang
                                            </button>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-end flex-wrap">
                                        <div class="col-sm-4 bg-body-secondary rounded-3 border border-dark py-3">
                                            <marquee behavior="scroll" scrollamount="15"
                                                class="fs-5 display-4 fw-semibold fst-normal" direction="left">
                                                <?php echo salam() . ", " . $_SESSION['nama'] ?>
                                            </marquee>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer my-2">
                                    <h4 class="fs-4 display-4 fw-semibold fst-normal">LAPORAN PERBULAN DAN PERTAHUN</h4>
                                    <form action="?page=export_laporan_barangmasuk_excel" method="post">
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-start align-items-start flex-wrap">
                                                <div class="col-md col-md-3">
                                                    <select class="form-select " name="bln">
                                                        <option value="1" selected="">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                                <div class="col-md col-md-3">
                                                    <?php
                                                $now = date('Y');
                                                echo "<select name='thn' class='form-select'>";
                                                for ($a = 2010; $a <= $now; $a++) {
                                                    echo "<option value='$a'>$a</option>";
                                                }
                                                echo "</select>";
                                                ?>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" class=" btn btn-danger my-2">
                                                <i class="fa fa-fw fa-file-excel"></i>
                                                Klick Here Export
                                            </button>
                                        </div>
                                    </form>
                                    <form id="Myform1">
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-start align-items-start flex-wrap">
                                                <div class="col-md col-md-3">
                                                    <select class="form-select" name="bln">
                                                        <option value="all" selected="">ALL</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                                <div class="col-md col-md-3">
                                                    <?php
                                                $now = date('Y');
                                                echo "<select name='thn' class='form-select'>";
                                                for ($a = 2010; $a <= $now; $a++) {
                                                    echo "<option value='$a'>$a</option>";
                                                }
                                                echo "</select>";
                                                ?>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-danger my-2">Tampilkan</button>
                                        </div>
                                    </form>
                                    <div class="tampung1"></div>
                                    <hr>
                                    <div class="container-fluid">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped-columns" id="datatable2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center fw-normal fs-6">No</th>
                                                        <th class="text-center fw-normal fs-6">Id Transaksi</th>
                                                        <th class="text-center fw-normal fs-6">Tanggal Masuk</th>
                                                        <th class="text-center fw-normal fs-6">Kode Barang</th>
                                                        <th class="text-center fw-normal fs-6">Nama Barang</th>
                                                        <th class="text-center fw-normal fs-6">Pengirim</th>
                                                        <th class="text-center fw-normal fs-6">Jumlah Masuk</th>
                                                        <th class="text-center fw-normal fs-6">Satuan Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php $ress = $in->barang_masuk(); ?>
                                                    <?php foreach ($ress as $data): ?>
                                                    <?php extract($data); ?>
                                                    <tr>
                                                        <td class="text-center fw-normal fs-6"><?php echo $no; ?></td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo $id_transaksi; ?>
                                                        </td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo $tanggal ?>
                                                        </td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo $kode_barang ?>
                                                        </td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo $nama_barang ?>
                                                        </td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo $pengirim ?>
                                                        </td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo $jumlah ?>
                                                        </td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo $satuan ?>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>