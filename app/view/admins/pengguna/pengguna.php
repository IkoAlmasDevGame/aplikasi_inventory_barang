<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Penggnuna</title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
        <style type="text/css">
        .table {
            width: 900px;
        }

        @media (min-width:1000px) {
            .table {
                min-width: 1000px;
            }
        }
        </style>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default bg-body-secondary container-fluid rounded-2 py-4">
            <div class="panel-heading py-2">
                <h4 class="panel-heading display-4 fs-3 text-dark fw-semibold fst-normal">
                    Data Penggnuna
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=pengguna" aria-current="page" class="text-decoration-none active">
                            Data Penggnuna
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
                                    Data Pengguna
                                </h4>
                            </div>
                            <div class="card-body my-2">
                                <div class="card-tools">
                                    <div class="text-start">
                                        <a href="?aksi=tambah-pengguna" aria-current="page">
                                            <button type="button" class="btn btn-danger">
                                                <i class="fa ga-regular fa-plus fa-1x fa-fw"></i>
                                                Tambah Pengguna
                                            </button>
                                        </a>
                                        <a href="?page=pengguna" aria-current="page">
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
                                            <table class="table table-striped-columns table-bordered" id="datatable2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center fs-6 fw-normal fst-normal">No</th>
                                                        <th class="text-center fs-6 fw-normal fst-normal">NIK</th>
                                                        <th class="text-center fs-6 fw-normal fst-normal">Nama</th>
                                                        <th class="text-center fs-6 fw-normal fst-normal">Telepon</th>
                                                        <th class="text-center fs-6 fw-normal fst-normal">Username</th>
                                                        <th class="text-center fs-6 fw-normal fst-normal">Jabatan</th>
                                                        <th class="text-center fs-6 fw-normal fst-normal">Foto</th>
                                                        <th class="text-center fs-6 fw-normal fst-normal">
                                                            Pengaturan
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php $ress = $pengguna->pengguna(); ?>
                                                    <?php foreach ($ress as $data): ?>
                                                    <tr>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <?php echo $no; ?>
                                                        </td>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <?php echo $data['nik'] ?>
                                                        </td>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <?php echo $data['nama'] ?>
                                                        </td>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <?php echo $data['telepon'] ?>
                                                        </td>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <?php echo $data['username'] ?>
                                                        </td>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <?php echo $data['level'] ?>
                                                        </td>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <img src="../../../../assets/foto/<?php echo $data['foto'] ?>"
                                                                class="img-responsive"
                                                                style="width: 50px; max-width: 50px;"
                                                                alt="<?php echo $data['foto'] ?>">
                                                        </td>
                                                        <td class="text-center fw-normal fst-normal">
                                                            <?php if ($data['level'] == 'superadmin'): ?>
                                                            <?php echo "Tidak Bisa Di Hapus"; ?>
                                                            <?php elseif ($data['level'] == 'admin' || $data['level'] == 'petugas'): ?>
                                                            <a href="?aksi=hapus_pengguna&nik=<?= $data['nik'] ?>"
                                                                aria-current="page"
                                                                onclick="return confirm('Apakah anda ingin menghapus data pegawai ini ?')">
                                                                <button type="button" class="btn btn-danger">
                                                                    <i class="fa fa-fw fa-trash-alt fa-1x"></i>
                                                                </button>
                                                            </a>
                                                            <a href="?aksi=reset_password&nik=<?= $data['nik'] ?>"
                                                                aria-current="page" title="reset password">
                                                                <button type="button" class="btn btn-info">
                                                                    <i class="fa fa-fw fa-recycle fa-1x"></i>
                                                                </button>
                                                            </a>
                                                            <?php endif; ?>
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