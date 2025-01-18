<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data Pengguna</title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
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
                    Tambah Data Pengguna
                </h4>
                <div class="d-sm-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page" class="text-decoration-none text-primary">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=pengguna" aria-current="page" class="text-decoration-none text-primary">
                            Data Penggnuna
                        </a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?aksi=tambah-pengguna" aria-current="page" class="text-decoration-none active">
                            Tambah Data Pengguna
                        </a>
                    </li>
                </div>
            </div>
            <div class="panel-body">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="col-sm col-sm-7 col-md col-md-7">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-2">
                                        <h4 class="card-title text-center fs-4 display-4 fst-normal fw-normal">
                                            Tambah Data Pengguna
                                        </h4>
                                    </div>
                                    <div class="card-body my-2">
                                        <form action="?aksi=tambah_pengguna" enctype="multipart/form-data" role="form"
                                            method="post" class="form-group">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label display-4 fs-4 fw-normal fst-normal">
                                                            <label for="nik">NIK</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <input type="text" inputmode="numeric"
                                                            placeholder="Nomor Induk Kependudukan" name="nik"
                                                            class="form-control" maxlength="16" id="nik">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label display-4 fs-4 fw-normal fst-normal">
                                                            <label for="nama">Nama</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <input type="text" placeholder="Nama Pengguna" name="nama"
                                                            class="form-control" maxlength="100" id="nama">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label display-4 fs-4 fw-normal fst-normal">
                                                            <label for="telepon">Telepon</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <input type="text" placeholder="Telepon Pengguna" name="telepon"
                                                            class="form-control" maxlength="15" id="telepon">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label display-4 fs-4 fw-normal fst-normal">
                                                            <label for="username">Username</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <input type="text" placeholder="Username Pengguna"
                                                            name="username" class="form-control" maxlength="100"
                                                            id="username">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label display-4 fs-4 fw-normal fst-normal">
                                                            <label for="level">Level</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm col-sm-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <select name="level" id="level"
                                                            class="form-control form-select">
                                                            <option value="">-- Pilih Level --</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="petugas">Petugas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-start flex-wrap">
                                                    <div class="col-sm col-sm-4 col-md col-md-4">
                                                        <div class="form-label display-4 fs-4 fw-normal fst-normal">
                                                            <label for="foto">Foto</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm col-sm-5 col-md col-md-5">
                                                        <div class="form-icon img-thumbnail w-25">
                                                            <img src="https://th.bing.com/th/id/OIP.jxhJvX2q8gLQmiFuOWa1bAHaHa?w=161&h=180&c=7&r=0&o=5&pid=1.7"
                                                                id="preview" alt="" width="64"
                                                                class="img-rounded img-fluid">
                                                        </div>
                                                        <div class="form-control my-3">
                                                            <input type="file" name="foto" id="foto" accept="image/*"
                                                                class="form-control-file" onchange="previewImage(this)"
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer my-2">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-regular fa-save fa-1x"></i>
                                                        Simpan Data
                                                    </button>
                                                    <a href="?page=pengguna" aria-current="page">
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