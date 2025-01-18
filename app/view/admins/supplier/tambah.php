<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data Supplier</title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php require_once("../../../library/function.php"); ?>
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
                    Tambah Data Supplier
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=supplier" aria-current="page" class="text-decoration-none text-primary">
                            Data Supplier
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?aksi=tambah-supplier" aria-current="page" class="text-decoration-none active">
                            Tambah Data Supplier
                        </a>
                    </li>
                </div>
            </div>
            <div class="panel-body">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="col-sm col-sm-6 col-md col-md-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h4 class="card-title text-center fs-4 display-4 fst-normal fw-normal">
                                            Tambah Supplier
                                        </h4>
                                    </div>
                                    <div class="card-body my-2">
                                        <form action="?aksi=tambah_supplier" role="form" method="post"
                                            class="form-group">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                        <label for="">Kode Supplier</label>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-6 col-md col-md-6">
                                                        <input type="text" name="kode_supplier" class="form-control"
                                                            id="kode_supplier"
                                                            value="<?= buatKode('tb_supplier', 'kode_supplier', 'SUP-'); ?>"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                        <label for="">Nama Supplier</label>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-6 col-md col-md-6">
                                                        <input type="text" name="nama_supplier" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                        <label for="">Alamat</label>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-6 col-md col-md-6">
                                                        <input type="text" name="alamat" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                        <label for="">Telepon</label>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-6 col-md col-md-6">
                                                        <input type="number" name="telepon" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer my-2">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-regular fa-save fa-1x"></i>
                                                        Simpan Data
                                                    </button>
                                                    <a href="?page=supplier" aria-current="page">
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
                </section>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>