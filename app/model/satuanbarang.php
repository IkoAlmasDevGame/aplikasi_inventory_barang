<?php

namespace model;

class satuanbarang
{
    protected $table = "satuan";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function satuan()
    {
        $SQL = "SELECT * FROM $this->table order by id asc";
        return $this->db->query($SQL);
    }

    public function hapus_satuanbarang($id)
    {
        $id = htmlspecialchars($_GET['id']);
        $data = $this->db->query("DELETE FROM $this->table WHERE id = '$id'");
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=satuan");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=satuan");
            exit(0);
        }
    }

    public function satuanbarang($satuan)
    {
        $satuan = htmlspecialchars($_POST['satuan']);
        # cek jenis barang yang sama
        $mysql = $this->db->query("SELECT * FROM $this->table WHERE satuan = '$satuan' order by satuan desc");
        $cek = mysqli_num_rows($mysql);

        if ($cek) {
            header("location:../ui/header.php?page=jenisbarang");
            exit(0);
        }

        if (isset($_POST['ganti'])) {
            $update = "UPDATE $this->table SET satuan = '$satuan' WHERE id = '$_POST[id]'";
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
            $insert = "INSERT INTO $this->table SET satuan = '$satuan'";
            $data = $this->db->query($insert);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?page=satuan");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?page=satuan");
                exit(0);
            }
        }
    }
}
