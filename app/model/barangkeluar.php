<?php

namespace model;

class barangkeluar
{
    protected $table = "barang_keluar";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function barang_keluar()
    {
        $SQL = "SELECT * FROM $this->table order by id_transaksi asc";
        return $this->db->query($SQL);
    }

    public function tambah_barangkeluar($id_transaksi, $tanggal, $jumlah, $total, $satuan, $tujuan)
    {
        $id_transaksi = htmlentities($_POST['id_transaksi']) ? htmlspecialchars($_POST['id_transaksi']) : $_POST['id_transaksi'];
        $tanggal = htmlentities($_POST['tanggal_keluar']) ? htmlspecialchars($_POST['tanggal_keluar']) : $_POST['tanggal_keluar'];
        $barang = htmlentities($_POST['barang']) ? htmlspecialchars($_POST['barang']) : $_POST['barang'];
        $pecah_barang = explode(".", $barang);
        $jumlah = htmlspecialchars($_POST['jumlahkeluar']) ? htmlentities($_POST['jumlahkeluar']) : $_POST['jumlahkeluar'];
        $satuan = htmlspecialchars($_POST['satuan']) ? htmlentities($_POST['satuan']) : $_POST['satuan'];
        $tujuan = htmlspecialchars($_POST['tujuan']) ? htmlentities($_POST['tujuan']) : $_POST['tujuan'];
        $total = htmlspecialchars((int)$_POST['total']) ? htmlentities((int)$_POST['total']) : (int)$_POST['total'];
        $sisa2 = (int)$total;

        if ($sisa2 < 0) {
            header("location:../ui/header.php?aksi=tambahbarangkeluar");
            exit(0);
        } else {
            $SQL = "INSERT INTO $this->table SET id_transaksi = '$id_transaksi', tanggal = '$tanggal', kode_barang = '$pecah_barang[0]', nama_barang = '$pecah_barang[1]', jumlah = '$jumlah',
             total = '$total', satuan = '$satuan', tujuan = '$tujuan'";
            $this->db->query("UPDATE gudang set jumlah=(jumlah) where kode_barang='$pecah_barang[0]'");
            $this->db->query("UPDATE barang_masuk set jumlah=($total) WHERE kode_barang='$pecah_barang[0]'");
            $data = $this->db->query($SQL);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?page=barangkeluar");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?aksi=tambahbarangkeluar");
                exit(0);
            }
        }
    }

    public function delete($id_transaksi)
    {
        $id_transaksi = htmlentities($_GET['id_transaksi']) ? htmlspecialchars($_GET['id_transaksi']) : $_GET['id_transaksi'];
        $SQL = "DELETE FROM $this->table WHERE id_transaksi = '$id_transaksi'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=barangkeluar");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=barangkeluar");
            exit(0);
        }
    }
}
