<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Barang Masuk</title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=laporan_barangmasuk"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
    </head>



    <body>
        <?php if (isset($_POST['submit'])) { ?>
        <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Barang_Keluar (" . date('d-m-Y') . ").xls");
        $bln = $_POST['bln'];
        $thn = $_POST['thn'];
        ?>
        <h4 style="font-size: 14px; font-weight: normal;
             font-family: sans-serif; font-style: normal; text-align: center;">
            Laporan Barang Keluar Bulan <?php echo $bln; ?> Tahun <?php echo $thn; ?>
        </h4>
        <table style="border-width: 1cm; border-style: solid; border-color: black;">
            <thead>
                <tr>
                    <th style="font-size: 14px; font-weight: normal;
                     font-family: Arial; font-style: normal; text-align: center;">
                        No</th>
                    <th style="font-size: 14px; font-weight: normal;
                     font-family: Arial; font-style: normal; text-align: center;">
                        Id Transaksi</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Tanggal Masuk</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Kode Barang</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Nama Barang</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Jumlah Masuk</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Tujuan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $ress = $koneksi->query("select * from barang_keluar where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn' order by id_transaksi asc"); ?>
                <?php foreach ($ress as $data): ?>
                <?php extract($data); ?>
                <tr>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $no; ?>
                    </td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $id_transaksi; ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $tanggal ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $kode_barang ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $nama_barang ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $jumlah ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $tujuan ?></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="table-responsive">
            <center>
                <h4>Laporan Barang Keluar Bulan <?php echo $_POST['bln']; ?> Tahun <?php echo $_POST['thn']; ?></h4>
            </center>
            <table class="table table-bordered table-striped-columns" id="datatable2">
                <thead>
                    <tr>
                        <th class="text-center fs-6 fw-normal">No</th>
                        <th class="text-center fs-6 fw-normal">Id Transaksi</th>
                        <th class="text-center fs-6 fw-normal">Tanggal Keluar</th>
                        <th class="text-center fs-6 fw-normal">Kode Barang</th>
                        <th class="text-center fs-6 fw-normal">Nama Barang</th>
                        <th class="text-center fs-6 fw-normal">Jumlah Keluar</th>
                        <th class="text-center fs-6 fw-normal">Tujuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $ress = $koneksi->query("select * from barang_keluar where YEAR(tanggal) = '$_POST[thn]' order by id_transaksi asc");
                    foreach ($ress as $data) {
                    ?>
                    <tr>
                        <td class="text-center fs-6 fw-normal"><?php echo $no; ?></td>
                        <td class="text-center fs-6 fw-normal"><?php echo $data['id_transaksi'] ?></td>
                        <td class="text-center fs-6 fw-normal"><?php echo $data['tanggal'] ?></td>
                        <td class="text-center fs-6 fw-normal"><?php echo $data['kode_barang'] ?></td>
                        <td class="text-center fs-6 fw-normal"><?php echo $data['nama_barang'] ?></td>
                        <td class="text-center fs-6 fw-normal"><?php echo $data['jumlah'] ?></td>
                        <td class="text-center fs-6 fw-normal"><?php echo $data['tujuan'] ?></td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
        <?php require_once("../ui/footer.php"); ?>