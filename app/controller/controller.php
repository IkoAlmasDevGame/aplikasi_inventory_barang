<?php

namespace controller;

use model\Authentication;
use model\barangmasuk;
use model\barangkeluar;
use model\gudang;
use model\jenisbarang;
use model\satuanbarang;
use model\supplier;
use model\pengguna;

class users
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pengguna($konfig);
    }

    public function tambah()
    {
        $nik = htmlspecialchars($_POST['nik']);
        $nama = htmlspecialchars($_POST['nama']);
        $telepon = htmlspecialchars($_POST['telepon']);
        $username = htmlspecialchars($_POST['username']);
        $data = $this->konfig->tambah_pengguna($nik, $nama, $telepon, $username);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function hapus()
    {
        $nik = htmlspecialchars($_GET['nik']);
        $data = $this->konfig->hapus_pengguna($nik);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function password_ubah()
    {
        $new_password = md5(htmlspecialchars($_POST['new_password']), false);
        $id = htmlspecialchars($_POST['id']);
        $data = $this->konfig->ubah_passowrd($new_password, $id);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function ubah_profile()
    {
        $id = htmlspecialchars($_POST['id']);
        $nik = htmlspecialchars($_POST['nik']);
        $nama = htmlspecialchars($_POST['nama']);
        $telepon = htmlspecialchars($_POST['telepon']);
        $username = htmlspecialchars($_POST['username']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $data = $this->konfig->ubah_pengguna($nik, $nama, $telepon, $username, $alamat, $id);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function reset()
    {
        $nik = htmlspecialchars($_GET['nik']);
        $password = md5($nik, false);
        $data = $this->konfig->reset_password($nik, $password);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }
}

class AuthLogin
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Authentication($konfig);
    }

    public function AksesLogin()
    {
        session_start();
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $mysql = $this->konfig->LoginAuth($username, $password);
        if ($mysql === true):
            return true;
        else:
            return false;
        endif;
    }
}

class barang_masuk
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new barangmasuk($konfig);
    }

    public function tambah()
    {
        $id_transaksi = htmlspecialchars($_POST['id_transaksi']);
        $tanggal = htmlspecialchars($_POST['tanggal_masuk']);
        # jumlah masuk
        $jumlah = htmlspecialchars($_POST['jumlahmasuk']);
        # table supplier
        $pengirim = htmlspecialchars($_POST['pengirim']) ? htmlentities($_POST['pengirim']) : $_POST['pengirim'];
        # table satuan
        $satuan = htmlspecialchars($_POST['satuan']);
        $data = $this->konfig->tambah_barangmasuk($id_transaksi, $tanggal, $jumlah, $satuan, $pengirim);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function hapus()
    {
        $id_transaksi = htmlentities($_GET['id_transaksi']) ? htmlspecialchars($_GET['id_transaksi']) : $_GET['id_transaksi'];
        $data = $this->konfig->delete($id_transaksi);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }
}

class barang_keluar
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new barangkeluar($konfig);
    }

    public function tambah()
    {
        $id_transaksi = htmlentities($_POST['id_transaksi']) ? htmlspecialchars($_POST['id_transaksi']) : $_POST['id_transaksi'];
        $tanggal = htmlentities($_POST['tanggal_keluar']) ? htmlspecialchars($_POST['tanggal_keluar']) : $_POST['tanggal_keluar'];
        $jumlah = htmlspecialchars($_POST['jumlahkeluar']) ? htmlentities($_POST['jumlahkeluar']) : $_POST['jumlahkeluar'];
        $satuan = htmlspecialchars($_POST['satuan']) ? htmlentities($_POST['satuan']) : $_POST['satuan'];
        $tujuan = htmlspecialchars($_POST['tujuan']) ? htmlentities($_POST['tujuan']) : $_POST['tujuan'];
        $total = htmlspecialchars($_POST['total']) ? htmlentities($_POST['total']) : $_POST['total'];
        $data = $this->konfig->tambah_barangkeluar($id_transaksi, $tanggal, $jumlah, $total, $satuan, $tujuan);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function hapus()
    {
        $id_transaksi = htmlentities($_GET['id_transaksi']) ? htmlspecialchars($_GET['id_transaksi']) : $_GET['id_transaksi'];
        $data = $this->konfig->delete($id_transaksi);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }
}

class building
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new gudang($konfig);
    }

    public function tambah()
    {
        $kode_barang = htmlentities($_POST['kode_barang']) ? htmlspecialchars($_POST['kode_barang']) : $_POST['kode_barang'];
        $nama_barang = htmlentities($_POST['nama_barang']) ? htmlspecialchars($_POST['nama_barang']) : $_POST['nama_barang'];
        $jenis_barang = htmlentities($_POST['jenis_barang']) ? htmlspecialchars($_POST['jenis_barang']) : $_POST['jenis_barang'];
        $jumlah = htmlentities($_POST['jumlah']) ? htmlspecialchars($_POST['jumlah']) : $_POST['jumlah'];
        $satuan = htmlentities($_POST['satuan']) ? htmlspecialchars($_POST['satuan']) : $_POST['satuan'];
        $data = $this->konfig->tambah_gudang($kode_barang, $nama_barang, $jenis_barang, $jumlah, $satuan);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function ubah()
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
        $data = $this->konfig->ubah_gudang($kode_barang, $nama_barang, $jenis_barang, $jumlah, $satuan);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function hapus()
    {
        $id = htmlentities($_GET['id']) ? htmlspecialchars($_GET['id']) : $_GET['id'];
        $data = $this->konfig->hapus_gudang($id);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }
}

class jenis_barang
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new jenisbarang($konfig);
    }

    public function tambah()
    {
        $jenis_barang = htmlspecialchars($_POST['jenis_barang']);
        $data = $this->konfig->jenisbarang($jenis_barang);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function hapus()
    {
        $id = htmlspecialchars($_GET['id']);
        $data = $this->konfig->hapus_jenisbarang($id);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }
}

class satuan_barang
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new satuanbarang($konfig);
    }

    public function tambah()
    {
        $satuan = htmlspecialchars($_POST['satuan']);
        $data = $this->konfig->satuanbarang($satuan);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function hapus()
    {
        $id = htmlspecialchars($_GET['id']);
        $data = $this->konfig->hapus_satuanbarang($id);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }
}

class supply
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new supplier($konfig);
    }

    public function tambah()
    {
        $kode_supplier = htmlentities($_POST['kode_supplier']) ? htmlspecialchars($_POST['kode_supplier']) : $_POST['kode_supplier'];
        $nama_supplier = htmlentities($_POST['nama_supplier']) ? htmlspecialchars($_POST['nama_supplier']) : $_POST['nama_supplier'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['telepon']) ? htmlspecialchars($_POST['telepon']) : $_POST['telepon'];
        $data = $this->konfig->tambah_supplier($kode_supplier, $nama_supplier, $alamat, $telepon);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function ubah()
    {
        $kode_supplier = htmlentities($_POST['kode_supplier']) ? htmlspecialchars($_POST['kode_supplier']) : $_POST['kode_supplier'];
        $nama_supplier = htmlentities($_POST['nama_supplier']) ? htmlspecialchars($_POST['nama_supplier']) : $_POST['nama_supplier'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $telepon = htmlentities($_POST['telepon']) ? htmlspecialchars($_POST['telepon']) : $_POST['telepon'];
        $id = htmlentities($_POST['id']) ? htmlspecialchars($_POST['id']) : $_POST['id'];
        $data = $this->konfig->ubah_supplier($kode_supplier, $nama_supplier, $alamat, $telepon, $id);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }

    public function hapus()
    {
        $id = htmlspecialchars($_GET['id']);
        $data = $this->konfig->hapus_supplier($id);
        if ($data === true):
            return true;
        else:
            return false;
        endif;
    }
}