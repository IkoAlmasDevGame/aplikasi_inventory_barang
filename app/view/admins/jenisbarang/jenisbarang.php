<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Jenis Barang</title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
        <style type="text/css">
        .table {
            width: 640px;
        }

        @media screen {
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
                    Data Jenis Barang
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=jenisbarang" aria-current="page" class="text-decoration-none active">
                            Data Jenis Barang
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
                                    Jenis Barang
                                </h4>
                            </div>
                            <div class="card-body my-2">
                                <div class="card-tools">
                                    <div class="text-start">
                                        <a href="?page=jenisbarang" aria-current="page">
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
                                    <?php if (isset($_GET['id'])): ?>
                                    <?php $SQL = "SELECT * FROM jenis_barang WHERE id = '$_GET[id]'"; ?>
                                    <?php $ress = $koneksi->query($SQL); ?>
                                    <?php while ($data = $ress->fetch_array()): ?>
                                    <form action="?aksi=tambah-jenis" class="form-group" role="form" method="post">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="col-sm col-sm-6 col-md col-md-6 bg-body-secondary py-3 rounded-2">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-start flex-wrap">
                                                    <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                        <label for="">Jenis Barang</label>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm co-sm-6 col-md col-md-6">
                                                        <input type="text" name="jenis_barang"
                                                            value="<?= $data['jenis_barang'] ?>" class="form-control"
                                                            placeholder="masukkan jenis barang ..." id="" required>
                                                        <input type="checkbox" name="ganti" class="form-check-input">
                                                        ingin ubah jenis barang (klick here)
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="d-flex justify-content-end align-items-end my-1">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-regular fa-save fa-1x"></i>
                                                            Update Data
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <form action="?aksi=tambah-jenis" class="form-group" role="form" method="post">
                                        <div class="col-sm col-sm-6 col-md col-md-6 bg-body-secondary py-3 rounded-2">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm col-sm-4 col-md col-md-4">
                                                        <label for="">Jenis Barang</label>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm co-sm-5 col-md col-md-5">
                                                        <input type="text" name="jenis_barang" class="form-control"
                                                            placeholder="masukkan jenis barang ..." id="" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 mx-5">
                                                    <div class="d-flex justify-content-end align-items-end my-1">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-regular fa-save fa-1x"></i>
                                                            Simpan Data
                                                        </button>
                                                        <div class="mx-1"></div>
                                                        <button type="reset" class="btn btn-danger">
                                                            <i class="fa fa-fw fa-eraser fa-1x"></i>
                                                            Hapus Data
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endif; ?>
                                    <div class="container-fluid my-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped-columns" id="datatable2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center fw-normal fs-6">No</th>
                                                        <th class="text-center fw-normal fs-6">Jenis Barang</th>
                                                        <th class="text-center fw-normal fs-6">Pengaturan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php $res = $jenis->jenis_barang(); ?>
                                                    <?php foreach ($res as $isi): ?>
                                                    <tr>
                                                        <td class="text-center fw-normal fs-6"><?php echo $no; ?></td>
                                                        <td class="text-center fw-normal fs-6">
                                                            <?php echo ucfirst(ucwords($isi['jenis_barang'])); ?>
                                                        </td>
                                                        <td class="text-center fw-normal">
                                                            <a href="?page=jenisbarang&id=<?= $isi['id'] ?>"
                                                                aria-current="page">
                                                                <button type="button" class="btn btn-warning">
                                                                    <i class="fa fa-regular fa-edit fa-1x"></i>
                                                                </button>
                                                            </a>
                                                            <a href="?aksi=hapus_jenis&id=<?= $isi['id'] ?>"
                                                                aria-current="page"
                                                                onclick="return confirm('Apakah anda ingin menghapus jenis barang ini <?= $isi['jenis_barang'] ?> ?')">
                                                                <button type="button" class="btn btn-danger">
                                                                    <i class="fa fa-fw fa-close fa-1x"></i>
                                                                </button>
                                                            </a>
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