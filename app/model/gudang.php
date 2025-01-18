<?php

namespace model;

class gudang
{
    protected $table = "gudang";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function gudang()
    {
        $SQL = "SELECT * FROM $this->table order by id asc";
        return $this->db->query($SQL);
    }

    public function tambah_gudang($kode_barang, $nama_barang, $jenis_barang, $jumlah, $satuan)
    {
        $kode_barang = htmlentities($_POST['kode_barang']) ? htmlspecialchars($_POST['kode_barang']) : $_POST['kode_barang'];
        $nama_barang = htmlentities($_POST['nama_barang']) ? htmlspecialchars($_POST['nama_barang']) : $_POST['nama_barang'];
        $jenis_barang = htmlentities($_POST['jenis_barang']) ? htmlspecialchars($_POST['jenis_barang']) : $_POST['jenis_barang'];
        $pecah_jenis = explode(".", $jenis_barang);
        $id = $pecah_jenis[0];
        $jenis_barang  = $pecah_jenis[1];
        $jumlah = htmlentities($_POST['jumlah']) ? htmlspecialchars($_POST['jumlah']) : $_POST['jumlah'];
        $satuan = htmlentities($_POST['satuan']) ? htmlspecialchars($_POST['satuan']) : $_POST['satuan'];
        $pecah_satuan = explode(".", $satuan);
        $id = $pecah_satuan[0];
        $satuan = $pecah_satuan[1];
        # database insert
        $SQL = "INSERT INTO $this->table SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', jenis_barang = '$jenis_barang', jumlah = '$jumlah', satuan = '$satuan'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=gudang");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=tambahgudang");
            exit(0);
        }
    }

    public function ubah_gudang($kode_barang, $nama_barang, $jenis_barang, $jumlah, $satuan)
    {
        $kode_barang = htmlentities($_POST['kode_barang']) ? htmlspecialchars($_POST['kode_barang']) : $_POST['kode_barang'];
        $nama_barang = htmlentities($_POST['nama_barang']) ? htmlspecialchars($_POST['nama_barang']) : $_POST['nama_barang'];
        $jenis_barang = htmlentities($_POST['jenis_barang']) ? htmlspecialchars($_POST['jenis_barang']) : $_POST['jenis_barang'];
        $pecah_jenis = explode(".", $jenis_barang);
        $id = $pecah_jenis[0];
        $jenis_barang = $pecah_jenis[1];
        $jumlah = htmlentities($_POST['jumlah']) ? htmlspecialchars($_POST['jumlah']) : $_POST['jumlah'];
        $satuan = $_POST['satuan'];
        $pecah_satuan = explode(".", $satuan);
        $id = $pecah_satuan[0];
        $satuan = $pecah_satuan[1];
        # database update
        $SQL = "UPDATE $this->table SET nama_barang = '$nama_barang', jenis_barang = '$jenis_barang', jumlah = '$jumlah', satuan = '$satuan' WHERE kode_barang = '$kode_barang'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=gudang");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=ubahgudang&kode_barang=$kode_barang");
            exit(0);
        }
    }

    public function hapus_gudang($id)
    {
        $id = htmlentities($_GET['id']) ? htmlspecialchars($_GET['id']) : $_GET['id'];
        # data delete to table database
        $delete = "DELETE FROM $this->table WHERE id = '$id'";
        $data = $this->db->query($delete);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=gudang");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=gudang");
            exit(0);
        }
    }
}
