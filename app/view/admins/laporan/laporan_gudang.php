<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Gudang</title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
        <style type="text/css">
        .table {
            width: 720px;
        }

        @media (min-width:720px) {
            .table {
                min-width: 720px;
            }
        }
        </style>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default bg-body-secondary container-fluid rounded-2 py-4">
            <div class="panel-heading py-2">
                <h4 class="panel-heading display-4 fs-3 text-dark fw-semibold fst-normal">
                    Laporan Gudang
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=laporan_gudang" aria-current="page" class="text-decoration-none active">
                            Laporan Gudang
                        </a>
                    </li>
                </div>
            </div>
            <div class="panel-body">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="card shadow mb-3">
                            <div class="card-header py-2">
                                <h4 class="card-title fs-4 display-4 fst-normal fw-normal">
                                    Laporan Gudang
                                </h4>
                            </div>
                            <div class="card-body my-2">
                                <div class="card-tools">
                                    <div class="text-start">
                                        <a href="?page=laporan_gudang" aria-current="page">
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
                                    <div class="container-fluid">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped-columns" id="datatable2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center fs-6 fw-normal">No</th>
                                                        <th class="text-center fs-6 fw-normal">Kode Barang</th>
                                                        <th class="text-center fs-6 fw-normal">Nama Barang</th>
                                                        <th class="text-center fs-6 fw-normal">Jenis Barang</th>
                                                        <th class="text-center fs-6 fw-normal">Jumlah Barang</th>
                                                        <th class="text-center fs-6 fw-normal">Satuan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php $ress = $building->gudang(); ?>
                                                    <?php while ($data = $ress->fetch_array()): ?>
                                                    <?php extract($data); ?>
                                                    <tr>
                                                        <td class="text-center fs-6 fw-normal"><?php echo $no; ?></td>
                                                        <td class="text-center fs-6 fw-normal">
                                                            <?php echo $kode_barang ?>
                                                        </td>
                                                        <td class="text-center fs-6 fw-normal">
                                                            <?php echo $nama_barang ?>
                                                        </td>
                                                        <td class="text-center fs-6 fw-normal">
                                                            <?php echo $jenis_barang ?>
                                                        </td>
                                                        <td class="text-center fs-6 fw-normal">
                                                            <?php echo $jumlah ?>
                                                        </td>
                                                        <td class="text-center fs-6 fw-normal">
                                                            <?php echo $satuan ?>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                            <tfoot>
                                                <a href="?page=export_laporan_gudang_excel" aria-current="page"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-fw fa-file-export fa-1x"></i>
                                                    Export To Excel
                                                </a>
                                            </tfoot>
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