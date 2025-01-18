<?php

namespace model;

class supplier
{
    protected $table = "tb_supplier";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function supplier()
    {
        $SQL = "SELECT * FROM $this->table order by id asc";
        return $this->db->query($SQL);
    }

    public function tambah_supplier($kode_supplier, $nama_supplier, $alamat, $telepon)
    {
        $kode_supplier = htmlentities($_POST['kode_supplier']) ? htmlspecialchars($_POST['kode_supplier']) : $_POST['kode_supplier'];
        $nama_supplier = htmlentities($_POST['nama_supplier']) ? htmlspecialchars($_POST['nama_supplier']) : $_POST['nama_supplier'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['telepon']) ? htmlspecialchars($_POST['telepon']) : $_POST['telepon'];
        # data insert to table database
        $insert = "INSERT INTO $this->table SET kode_supplier = '$kode_supplier', nama_supplier = '$nama_supplier', alamat = '$alamat', telepon = '$telepon'";
        $data = $this->db->query($insert);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=supplier");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=tambah-supplier");
            exit(0);
        }
    }

    public function ubah_supplier($kode_supplier, $nama_supplier, $alamat, $telepon, $id)
    {
        $kode_supplier = htmlentities($_POST['kode_supplier']) ? htmlspecialchars($_POST['kode_supplier']) : $_POST['kode_supplier'];
        $nama_supplier = htmlentities($_POST['nama_supplier']) ? htmlspecialchars($_POST['nama_supplier']) : $_POST['nama_supplier'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['telepon']) ? htmlspecialchars($_POST['telepon']) : $_POST['telepon'];
        $id = htmlentities($_POST['id']) ? htmlspecialchars($_POST['id']) : $_POST['id'];
        $insert = "UPDATE $this->table SET kode_supplier = '$kode_supplier', nama_supplier = '$nama_supplier', alamat = '$alamat', telepon = '$telepon' WHERE id = '$id'";
        $data = $this->db->query($insert);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=supplier");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=ubah-supplier&id=$id");
            exit(0);
        }
    }

    public function hapus_supplier($id)
    {
        $id = htmlentities($_GET['id']) ? htmlspecialchars($_GET['id']) : $_GET['id'];
        # data delete to table database
        $delete = "DELETE FROM $this->table WHERE id = '$id'";
        $data = $this->db->query($delete);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=supplier");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=supplier");
            exit(0);
        }
    }
}
