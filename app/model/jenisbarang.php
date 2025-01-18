<?php

namespace model;

class jenisbarang
{
    protected $table = "jenis_barang";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function jenis_barang()
    {
        $SQL = "SELECT * FROM $this->table order by id asc";
        return $this->db->query($SQL);
    }

    public function hapus_jenisbarang($id)
    {
        $id = htmlspecialchars($_GET['id']);
        $data = $this->db->query("DELETE FROM $this->table WHERE id = '$id'");
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=jenisbarang");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=jenisbarang");
            exit(0);
        }
    }

    public function jenisbarang($jenis_barang)
    {
        $jenis_barang = htmlspecialchars($_POST['jenis_barang']);
        # cek jenis barang yang sama
        $mysql = $this->db->query("SELECT * FROM $this->table WHERE jenis_barang = '$jenis_barang' order by jenis_barang desc");
        $cek = mysqli_num_rows($mysql);

        if ($cek) {
            header("location:../ui/header.php?page=jenisbarang");
            exit(0);
        }

        if (isset($_POST['ganti'])) {
            $update = "UPDATE $this->table SET jenis_barang = '$jenis_barang' WHERE id = '$_POST[id]'";
            $data = $this->db->query($update);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?page=jenisbarang");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?page=jenisbarang");
                exit(0);
            }
        } else {
            $insert = "INSERT INTO $this->table SET jenis_barang = '$jenis_barang'";
            $data = $this->db->query($insert);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?page=jenisbarang");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?page=jenisbarang");
                exit(0);
            }
        }
    }
}
