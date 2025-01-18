<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Supplier</title>
        <?php if ($_SESSION['user_akses'] == 'superadmin' && $_SESSION['level'] == 'superadmin'): ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php else: ?>
        <?php header("location:../ui/header.php?page=laporan_supplier"); ?>
        <?php exit(0); ?>
        <?php endif; ?>
    </head>



    <body>
        <?php header("Content-type: application/vnd-ms-excel"); ?>
        <?php header("Content-Disposition: attachment; filename=Laporan_Supplier (" . date('d-m-Y') . ").xls"); ?>
        <h4 style="font-size: 14px; font-weight: normal;
             font-family: sans-serif; font-style: normal; text-align: center;">
            Laporan Supplier
        </h4>
        <table style="border-width: 1cm; border-style: solid; border-color: black;">
            <thead>
                <tr>
                    <th style="font-size: 14px; font-weight: normal;
                     font-family: Arial; font-style: normal; text-align: center;">
                        No</th>
                    <th style="font-size: 14px; font-weight: normal;
                     font-family: Arial; font-style: normal; text-align: center;">
                        Kode Supplier</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Nama Supplier</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Alamat</th>
                    <th style="font-size: 14px; font-family: Arial; font-weight: normal;
                     font-style: normal; text-align: center;">
                        Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $ress = $koneksi->query("select * from tb_supplier order by id asc"); ?>
                <?php foreach ($ress as $data): ?>
                <?php extract($data); ?>
                <tr>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $no; ?>
                    </td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $kode_supplier; ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $nama_supplier ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $alamat ?></td>
                    <td style="font-size: 14px; font-family: Arial; font-weight: normal;
                         font-style: normal; text-align: center;">
                        <?php echo $telepon ?></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php require_once("../ui/footer.php"); ?>