<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $pagedesc = "Data Profile Pribadi"; ?>
        <title><?php echo $setting['nama'] . " - " . $pagedesc; ?></title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php } else { ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php } ?>
        <style type="text/css">
        .fst-times {
            font-family: 'Times New Roman';
            font-weight: 500;
            font-style: normal;
        }
        </style>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php"); ?>
        <div class="panel panel-default container-fluid bg-body-secondary rounded-2">
            <div class="panel-heading py-4 container-fluid">
                <h4 class="panel-title display-4 fs-3 fst-times">
                    <?php echo $pagedesc ?></h4>
                <div class="d-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page"
                            class="text-decoration-none text-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=user-profile&id=<?= $_GET['id'] ?>" aria-current="page"
                            class="text-decoration-none active"><?php echo $pagedesc; ?></a>
                    </li>
                </div>
            </div>
            <div class="panel-body">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="p-1 p-lg-1 m-1 m-lg-1">
                            <div class="mb-3"></div>
                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                <?php if (isset($_GET['id'])) : ?>
                                <?php $user = $pengguna->edit($_GET['id']); ?>
                                <?php foreach ($user as $row) { ?>
                                <div class="card col-sm-7 col-md-7 mb-3">
                                    <div class="card-header py-2">
                                        <h4 class="card-title fs-4 display-4 fst-times">
                                            <?php echo "<div class='display-4 fs-4 text-center fst-times text-dark my-2'>Data Profile : $row[nama]</div><br"; ?>
                                        </h4>
                                    </div>
                                    <div class="card-body my-2">
                                        <?php if (isset($_GET['data'])) { ?>
                                        <?php foreach ($user as $data) { ?>
                                        <form action="?aksi=ubah_profile" enctype="multipart/form-data"
                                            class="form-group" method="post">
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="" class="label label-default">NIK</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" class="form-control" name="nik"
                                                            value="<?= $data['nik'] ?>" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="" class="label label-default">Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" class="form-control" name="nama"
                                                            value="<?= $data['nama'] ?>" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="" class="label label-default">Username</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" class="form-control" name="username"
                                                            value="<?= $data['username'] ?>" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="" class="label label-default">Alamat</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" class="form-control" name="alamat"
                                                            value="<?= $data['alamat'] ?>" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="" class="label label-default">Nomor Telepon</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" class="form-control" name="telepon"
                                                            value="<?= $data['telepon'] ?>" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-start flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 display-4 fs-5 fst-times">
                                                        <label for="" class="label label-default">Foto</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-icon img-thumbnail w-25">
                                                            <?php $file = __FILE__ . "user_logo.png"; ?>
                                                            <?php $dir = __DIR__ . "../../../../assets/default/" . $file; ?>
                                                            <?php if ($data['foto'] != $dir) { ?>
                                                            <img id="preview"
                                                                src="../../../../assets/foto/<?= $data['foto'] ?>"
                                                                alt="" width="64" class="img-rounded img-fluid">
                                                            <?php } else { ?>
                                                            <img src="<?php echo $dir ?>" alt="" width="64"
                                                                class="img-rounded img-fluid">
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-control my-3">
                                                            <input type="file" name="foto" accept="image/*"
                                                                class="form-control-file" onchange="previewImage(this)"
                                                                aria-required="true">
                                                            <div class="my-1"></div>
                                                            <input type="checkbox" name="ubahfoto"
                                                                class="form-check-input" id=""> Klik jika ingin ubah
                                                            foto
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (isset($_GET['data'])) { ?>
                                            <div class="card-footer">
                                                <div class="text-start">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-save"></i>
                                                        Update Data
                                                    </button>
                                                    <a href="?page=user-profile&id=<?= $data['id'] ?>"
                                                        aria-current="page" class="btn btn-danger">
                                                        <i class="fas fa-fw fa-close"></i>
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </form>
                                        <?php } ?>
                                        <?php } elseif (isset($_GET['change'])) { ?>
                                        <?php foreach ($user as $isi): ?>
                                        <form action="?aksi=ubah_password" class="form-group" method="post">
                                            <input type="hidden" name="id" value="<?= $isi['id'] ?>">
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="old_password" class="label label-default">Old
                                                            Password</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="password" placeholder="masukkan password lama ..."
                                                            class="form-control" name="old_password" value="" required
                                                            id="old_password" aria-required="TRUE">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="new_password"
                                                            class="label label-default">Password</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="password" placeholder="masukkan password baru ..."
                                                            class="form-control" name="new_password" value="" required
                                                            id="new_password" aria-required="TRUE">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-2">
                                                <div class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                        <label for="new_password_verify"
                                                            class="label label-default">Password
                                                            Verify</label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="password"
                                                            placeholder="ulangi password baru anda ..."
                                                            class="form-control" name="new_password_verify" value=""
                                                            required id="new_password_verify" aria-required="TRUE">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (isset($_GET['change'])): ?>
                                            <div class="card-footer">
                                                <div class="text-start">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-save"></i>
                                                        Update Password
                                                    </button>
                                                    <a href="?page=user-profile&id=<?= $isi['id'] ?>"
                                                        aria-current="page" class="btn btn-danger">
                                                        <i class="fas fa-fw fa-close"></i>
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </form>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php } else { ?>
                                    <div class="form-inline my-2">
                                        <div class="row justify-content-center align-items-center flex-wrap">
                                            <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                <label for="" class="label label-default">NIK</label>
                                            </div>
                                            <div class="col-sm-1 col-md-1">:</div>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" class="form-control" name="nik"
                                                    value="<?= $row['nik'] ?>" id="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline my-2">
                                        <div class="row justify-content-center align-items-center flex-wrap">
                                            <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                <label for="" class="label label-default">User Name</label>
                                            </div>
                                            <div class="col-sm-1 col-md-1">:</div>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" class="form-control" name="username"
                                                    value="<?= $row['username'] ?>" id="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline my-2">
                                        <div class="row justify-content-center align-items-center flex-wrap">
                                            <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                <label for="" class="label label-default">Nama Lengkap</label>
                                            </div>
                                            <div class="col-sm-1 col-md-1">:</div>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" class="form-control" name="nama_lengkap"
                                                    value="<?= $row['nama'] ?>" id="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline my-2">
                                        <div class="row justify-content-center align-items-center flex-wrap">
                                            <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                <label for="" class="label label-default">Nomor Telepon</label>
                                            </div>
                                            <div class="col-sm-1 col-md-1">:</div>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" class="form-control" name="telepon"
                                                    value="<?= $row['telepon'] ?>" id="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline my-2">
                                        <div class="row justify-content-center align-items-center flex-wrap">
                                            <div class="form-label col-sm-4 col-md-4 fs-5 display-4 fst-times">
                                                <label for="" class="label label-default">Alamat</label>
                                            </div>
                                            <div class="col-sm-1 col-md-1">:</div>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" class="form-control" name="alamat"
                                                    value="<?= $row['alamat'] ?>" id="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer my-2">
                                        <div class="text-start">
                                            <a href="?page=user-profile&id=<?= $row['id'] ?>&data=<?= $row['id'] ?>"
                                                aria-current="page" class="btn btn-success">
                                                <i class="fas fa-fw fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="?page=user-profile&id=<?= $row['id'] ?>&change=<?= $row['id'] ?>"
                                                aria-current="page" class="btn btn-danger">
                                                <i class="fas fa-fw fa-lock"></i>
                                                Change Password
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php require_once("../ui/footer.php"); ?>