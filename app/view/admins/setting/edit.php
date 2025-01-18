<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $pagedesc = "Data Website Profile"; ?>
        <title><?php echo $setting['nama'] . " - " . $pagedesc; ?></title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'perbarui_website') {
                $id = htmlspecialchars($_POST['id']);
                $website = htmlspecialchars($_POST['nama']);
                $nama = htmlspecialchars($_POST['developer']);
                $status = htmlspecialchars($_POST['status']);
                $SQL = "UPDATE setting SET nama = '$website', developer = '$nama', status = '$status' WHERE id = '$id'";
                $data = $koneksi->query($SQL);
                if ($data != "") {
                    if ($data) {
                        header("location:../ui/header.php?page=setting&id=$id");
                        exit(0);
                    }
                } else {
                    header("location:../ui/header.php?page=setting&id=$id");
                    exit(0);
                }
            }
        }
        ?>
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
                        <a href="?page=setting&id=<?= $_GET['id'] ?>" aria-current="page"
                            class="text-decoration-none active"><?php echo $pagedesc; ?></a>
                    </li>
                </div>
            </div>
            <div class="panel-body">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="p-1 p-lg-1 m-1 m-lg-1">
                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                <div class="col-sm-7 col-md-7">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-2">
                                            <h4 class="card-title fw-normal text-center display-4 fs-3"
                                                style="font-family: 'Times New Roman'; font-style: normal; font-weight: 500;">
                                                <?php echo $pagedesc ?>
                                            </h4>
                                        </div>
                                        <div class="card-body my-2">
                                            <?php if (isset($_GET['id'])): ?>
                                            <?php $SQL = "SELECT * FROM setting WHERE id = '$_GET[id]'"; ?>
                                            <?php $res = $koneksi->query($SQL); ?>
                                            <?php foreach ($res as $data): ?>
                                            <form action="?page=setting&id=1&aksi=perbarui_website" method="post"
                                                class="form-group">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                <div class="form-inline my-2">
                                                    <div class="row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label col-sm-5 col-md-5 fs-4 fst-times">
                                                            <label for="" class="label label-default">Nama
                                                                Pemilik</label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1">:</div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" value="<?= $data['developer'] ?>"
                                                                name="developer" id="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline my-2">
                                                    <div class="row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label col-sm-5 col-md-5 fs-4 fst-times">
                                                            <label for="" class="label label-default">Nama
                                                                Website</label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1">:</div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" value="<?= $data['nama'] ?>" name="nama"
                                                                id="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline my-2">
                                                    <div class="row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label col-sm-5 col-md-5 fs-4 fst-times">
                                                            <label for="" class="label label-default">Status
                                                                Website</label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1">:</div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <select name="status" id="" class="form-select">
                                                                <option value="" selected>Pilih Status Website</option>
                                                                <option value="1" <?php if ($data['status'] == '1') { ?>
                                                                    selected <?php } ?>>Status Active</option>
                                                                <option value="0" <?php if ($data['status'] == '0') { ?>
                                                                    selected <?php } ?>>Status Non-Active</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer my-1">
                                                    <div class="text-center">
                                                        <button type="submit" name="btnEditSetting"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-fw fa-save fa-1x"></i>
                                                            Update Data
                                                        </button>
                                                        <a href="?page=beranda" aria-current="page">
                                                            <button type="button"
                                                                class="btn btn-default btn-outline-dark">
                                                                <i class="fas fa-fw fa-close fa-1x"></i>
                                                                Kembali
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php require_once("../ui/footer.php"); ?>