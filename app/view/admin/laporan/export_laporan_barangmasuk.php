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
        <?php header("location:../ui/header.php?page=laporan_barangmasuk"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
    </head>



    <body>
        <?php if (isset($_POST['submit'])) { ?>
        <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Barang_Masuk (" . date('d-m-Y') . ").xls");
        $bln = $_POST['bln'];
        $thn = $_POST['thn'];
        ?>
        <h4 style="font-size: 14px; font-weight: normal;
             font-family: sans-serif; font-style: normal; text-align: center;">
            Laporan Barang Masuk Bulan <?php echo $bln; ?> Tahun <?php echo $thn; ?>
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
                        Pengirim</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Jumlah Masuk</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Satuan Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $ress = $koneksi->query("select * from barang_masuk where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn' order by id_transaksi asc"); ?>
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
                        <?php echo $pengirim ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $jumlah ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $satuan ?></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="table-responsive">
            <center>
                <h4>Laporan Barang Masuk Bulan <?php echo $_POST['bln']; ?> Tahun <?php echo $_POST['thn']; ?></h4>
            </center>
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
                    <?php
                    $no = 1;
                    $ress = $koneksi->query("select * from barang_masuk where YEAR(tanggal) = '$_POST[thn]' order by id_transaksi asc");
                    foreach ($ress as $data) {
                    ?>
                    <tr>
                        <td class="text-center fw-normal fs-6"><?php echo $no; ?></td>
                        <td class="text-center fw-normal fs-6"><?php echo $data['id_transaksi'] ?></td>
                        <td class="text-center fw-normal fs-6"><?php echo $data['tanggal'] ?></td>
                        <td class="text-center fw-normal fs-6"><?php echo $data['kode_barang'] ?></td>
                        <td class="text-center fw-normal fs-6"><?php echo $data['nama_barang'] ?></td>
                        <td class="text-center fw-normal fs-6"><?php echo $data['pengirim'] ?></td>
                        <td class="text-center fw-normal fs-6"><?php echo $data['jumlah'] ?></td>
                        <td class="text-center fw-normal fs-6"><?php echo $data['satuan'] ?></td>
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