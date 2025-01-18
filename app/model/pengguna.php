<?php

namespace model;

class pengguna
{
    protected $table = "users";
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function ubah_passowrd($new_password, $id)
    {
        $new_password = md5(htmlspecialchars($_POST['new_password']), false);
        $old_password = md5(htmlspecialchars($_POST['old_password']), false);
        $new_password_verify = md5(htmlspecialchars($_POST['new_password_verify']), false);
        $id = htmlspecialchars($_POST['id']);
        # database password
        $mysql = $this->db->query("SELECT * FROM $this->table WHERE id = '$id'");
        $row = mysqli_fetch_array($mysql);
        # cek update password
        if (password_verify($old_password, PASSWORD_DEFAULT) == md5($row['password'], false)) {
            header("location:../ui/header.php?page=user-profile&id=$id&change=$id");
            exit(0);
        }

        # change password yang terbaru ...
        if ($new_password == $new_password_verify) {
            $SQL = "UPDATE $this->table SET password = '$new_password' WHERE id = '$id'";
            $data = $this->db->query($SQL);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?page=user-profile&id=$id");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?page=user-profile&id=$id&change=$id");
                exit(0);
            }
        }
    }

    public function ubah_pengguna($nik, $nama, $telepon, $username, $alamat, $id)
    {
        $id = htmlspecialchars($_POST['id']);
        $nik = htmlspecialchars($_POST['nik']);
        $nama = htmlspecialchars($_POST['nama']);
        $telepon = htmlspecialchars($_POST['telepon']);
        $username = htmlspecialchars($_POST['username']);
        $alamat = htmlspecialchars($_POST['alamat']);
        # Foto Upload
        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif');
        $photo_src = htmlentities($_FILES["foto"]["name"]) ? htmlspecialchars($_FILES["foto"]["name"]) : $_FILES["foto"]["name"];
        $x_foto = explode('.', $photo_src);
        $ekstensi_photo_src = strtolower(end($x_foto));
        $ukuran_photo_src = $_FILES['foto']['size'];
        $file_tmp_photo_src = $_FILES['foto']['tmp_name'];

        if (in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true) {
            if ($ukuran_photo_src < 10440070) {
                move_uploaded_file($file_tmp_photo_src, "../../../../assets/foto/" . $photo_src);
            } else {
                echo "Tidak Dapat Ter - Upload Size Gambar";
                exit;
            }
        } else {
            echo "Tidak Dapat Ter - Upload Gambar";
            die;
        }

        $mysql = $this->db->query("SELECT * FROM $this->table WHERE id = '$id'");
        $row = mysqli_fetch_array($mysql);
        # code foto pengguna
        if (isset($_POST['ubahfoto'])) {
            if ($row['foto'] == '') {
                $update = "UPDATE $this->table SET nik = '$nik', nama = '$nama', alamat = '$alamat', telepon = '$telepon', username = '$username', foto = '$photo_src' WHERE id = '$id'";
                $data = $this->db->query($update);
                if ($data != "") {
                    if ($data) {
                        header("location:../ui/header.php?page=user-profile&id=$id");
                        exit(0);
                    }
                } else {
                    header("location:../ui/header.php?page=user-profile&id=$id&data=$id");
                    exit(0);
                }
            } else if ($row['foto'] != '') {
                if ($photo_src != '') {
                    $update = "UPDATE $this->table SET nik = '$nik', nama = '$nama', alamat = '$alamat', telepon = '$telepon', username = '$username', foto = '$photo_src' WHERE id = '$id'";
                    $data = $this->db->query($update);
                    unlink("../../../../assets/foto/$row[foto]");
                    if ($data != "") {
                        if ($data) {
                            header("location:../ui/header.php?page=user-profile&id=$id");
                            exit(0);
                        }
                    } else {
                        header("location:../ui/header.php?page=user-profile&id=$id&data=$id");
                        exit(0);
                    }
                }
            }
        }
    }

    public function edit($id)
    {
        $SQL = "SELECT * FROM $this->table WHERE id = '$id' order by id asc";
        return $this->db->query($SQL);
    }

    public function pengguna()
    {
        $SQL = "SELECT * FROM $this->table order by id asc";
        return $this->db->query($SQL);
    }

    public function hapus_pengguna($nik)
    {
        $nik = htmlspecialchars($_GET['nik']);
        $this->db->query("DELETE FROM $this->table WHERE nik = '$nik'");
        header("location:../ui/header.php?page=pengguna");
        exit(0);
    }

    public function reset_password($nik, $password)
    {
        $nik = htmlspecialchars($_GET['nik']);
        $password = md5($nik, false);
        $this->db->query("UPDATE $this->table SET password = '$password' WHERE nik = '$_POST[nik]'");
        header("location:../ui/header.php?page=pengguna");
        exit(0);
    }

    public function tambah_pengguna($nik, $nama, $telepon, $username)
    {
        if (empty($_POST['nik']) || empty($_POST['nama']) || empty($_POST['telepon']) || empty($_POST['username'])):
            header("location:../ui/header.php?aksi=tambah-pengguna");
            exit(0);
        else:
            $nik = htmlspecialchars($_POST['nik']);
            $nama = htmlspecialchars($_POST['nama']);
            $telepon = htmlspecialchars($_POST['telepon']);
            $username = htmlspecialchars($_POST['username']);
            $password = md5($nik, false);
            $level = htmlspecialchars($_POST['level']);
            $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif');
            $photo_src = htmlentities($_FILES["foto"]["name"]) ? htmlspecialchars($_FILES["foto"]["name"]) : $_FILES["foto"]["name"];
            $x_foto = explode('.', $photo_src);
            $ekstensi_photo_src = strtolower(end($x_foto));
            $ukuran_photo_src = $_FILES['foto']['size'];
            $file_tmp_photo_src = $_FILES['foto']['tmp_name'];
            # section foto
            if (in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true) {
                if ($ukuran_photo_src < 10440070) {
                    move_uploaded_file($file_tmp_photo_src, "../../../../assets/foto/" . $photo_src);
                } else {
                    echo "Tidak Dapat Ter - Upload Size Gambar";
                    exit(0);
                }
            } else {
                echo "Tidak Dapat Ter-Upload Ke Dalam Database";
                exit(0);
            }
            # Insert Database
            $SQL = "SELECT * FROM $this->table WHERE nik = '$nik' order by nik desc";
            $mysql = $this->db->query($SQL);
            $cek = mysqli_num_rows($mysql);
            if ($cek) {
                header("location:../ui/header.php?aksi=tambah-pengguna");
                exit(0);
            } else {
                $insert = "INSERT INTO $this->table SET nik = '$nik', nama = '$nama', alamat = '', telepon = '$telepon', username = '$username', password = '$password', level = '$level', foto = '$photo_src'";
                $data = $this->db->query($insert);
                if ($data != "") {
                    if ($data) {
                        header("location:../ui/header.php?page=pengguna");
                        exit(0);
                    }
                } else {
                    header("location:../ui/header.php?aksi=tambah-pengguna");
                    exit(0);
                }
            }
        endif;
    }
}