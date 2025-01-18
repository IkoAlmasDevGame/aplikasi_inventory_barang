<?php

namespace model;

class barangmasuk
{
    protected $table = "barang_masuk";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function barang_masuk()
    {
        $SQL = "SELECT * FROM $this->table order by id_transaksi asc";
        return $this->db->query($SQL);
    }

    public function tambah_barangmasuk($id_transaksi, $tanggal, $jumlah, $satuan, $pengirim)
    {
        $id_transaksi = htmlspecialchars($_POST['id_transaksi']);
        $tanggal = htmlspecialchars($_POST['tanggal_masuk']);
        # table gudang
        $barang = htmlspecialchars($_POST['barang']);
        $pecah_barang = explode(".", $barang);
        # jumlah masuk
        $jumlah = htmlspecialchars($_POST['jumlahmasuk']);
        # table supplier
        $pengirim = htmlspecialchars($_POST['pengirim']) ? htmlentities($_POST['pengirim']) : $_POST['pengirim'];
        $pecah_nama = explode(".", $pengirim);
        $nama_supplier = $pecah_nama[0];
        # table satuan
        $satuan = htmlspecialchars($_POST['satuan']);
        # data insert to database
        $SQL = "INSERT INTO $this->table SET id_transaksi = '$id_transaksi', tanggal = '$tanggal', kode_barang = '$pecah_barang[0]', nama_barang = '$pecah_barang[1]', 
        jumlah = '$jumlah', satuan = '$satuan', pengirim='$pengirim'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=barangmasuk");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=tambahbarangmasuk");
            exit(0);
        }
    }

    public function delete($id_transaksi)
    {
        $id_transaksi = htmlentities($_GET['id_transaksi']) ? htmlspecialchars($_GET['id_transaksi']) : $_GET['id_transaksi'];
        $SQL = "DELETE FROM $this->table WHERE id_transaksi = '$id_transaksi'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=barangmasuk");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=barangmasuk");
            exit(0);
        }
    }
}
