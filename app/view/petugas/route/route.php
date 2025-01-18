<?php

use model\barangmasuk;

require_once("../../../config/config.php");
$setting = $koneksi->query("SELECT * FROM setting")->fetch_array();
# cek database users pada level superadmin
if (isset($_SESSION['status'])) {
    if (isset($_SESSION['petugas'])) {
        if (isset($_SESSION['level'])) {
            if (isset($_SESSION['user_akses'])) {
                if (isset($_COOKIE['cookies'])) {
                    if (isset($_SERVER['HTTPS'])) {
                        if ($_SERVER['REDIRECT_STATUS']) {
                            if (isset($_SESSION['username'])) {
                                if (isset($_SESSION['nama'])) {
                                }
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        window.location.href='../../index.php'
    }, 3000);
    </script>";
    die;
    exit(0);
}
# Files Model & Controller
# Files Model
require_once("../../../model/authentication.php");
$authentication = new model\Authentication($koneksi);
require_once("../../../model/barangmasuk.php");
$in = new model\barangmasuk($koneksi);
require_once("../../../model/barangkeluar.php");
$out = new model\barangkeluar($koneksi);
require_once("../../../model/gudang.php");
$building = new model\gudang($koneksi);
require_once("../../../model/jenisbarang.php");
$jenis = new model\jenisbarang($koneksi);
require_once("../../../model/satuanbarang.php");
$satuan = new model\satuanbarang($koneksi);
require_once("../../../model/supplier.php");
$supplier = new model\supplier($koneksi);
require_once("../../../model/pengguna.php");
$pengguna = new model\pengguna($koneksi);
# Files Controller
require_once("../../../controller/controller.php");
$auth = new controller\AuthLogin($koneksi);
$masuk = new controller\barang_masuk($koneksi);
$keluar = new controller\barang_keluar($koneksi);
$gudang = new controller\building($koneksi);
$jenisbarang = new controller\jenis_barang($koneksi);
$satuanbarang = new controller\satuan_barang($koneksi);
$supply = new controller\supply($koneksi);
$user = new controller\users($koneksi);
# Page / Halaman
if (!isset($_GET['page'])) {
} else {
    switch ($_GET['page']) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;

        case 'user-profile':
            require_once("../profile/edit.php");
            break;

            # Page Barang Masuk
        case 'barangmasuk':
            require_once("../barangmasuk/barangmasuk.php");
            break;
            # Page Barang Masuk

            # Page Pengguna
        case 'pengguna':
            require_once("../pengguna/pengguna.php");
            break;
            # Page Pengguna

            # Page Barang Keluar
        case 'barangkeluar':
            require_once("../barangkeluar/barangkeluar.php");
            break;
            # Page Barang Keluar

            # Page Gudang
        case 'gudang':
            require_once("../gudang/gudang.php");
            break;
            # Page Gudang

            # Page Jenis Barang
        case 'jenisbarang':
            require_once("../jenisbarang/jenisbarang.php");
            break;
            # Page Jenis Barang

            # Page Satuan Barang
        case 'satuan':
            require_once("../satuan/satuan.php");
            break;
            # Page Satuan Barang

            # Page Satuan Barang
        case 'supplier':
            require_once("../supplier/supplier.php");
            break;
            # Page Satuan Barang

        case 'logout':
            if (isset($_SESSION['status'])) {
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../../index.php");
            exit(0);
            break;

        default:
            require_once("../dashboard/index.php");
            break;
    }
}
# Aksi / Action
if (!isset($_GET['aksi'])) {
} else {
    switch ($_GET['aksi']) {
            # Page Pengguna
            // case 'tambah-pengguna':
            //     require_once("../pengguna/tambah.php");
            //     break;
            // case 'tambah_pengguna':
            //     $user->tambah();
            //     break;
            // case 'hapus_pengguna':
            //     $user->hapus();
            //     break;
            // case 'reset_password':
            //     $user->reset();
            //     break;
        case 'ubah_password':
            $user->password_ubah();
            break;
        case 'ubah_profile':
            $user->ubah_profile();
            break;
            # Page Pengguna

            # Page Barang Masuk
        case 'tambahbarangmasuk':
            require_once("../barangmasuk/tambah.php");
            break;
        case 'tambah-barangmasuk':
            $masuk->tambah();
            break;
        case 'hapus_barangmasuk':
            $masuk->hapus();
            break;
            # Page Barang Masuk

            # Page Barang Keluar
        case 'tambahbarangkeluar':
            require_once("../barangkeluar/tambah.php");
            break;
        case 'tambah-barangkeluar':
            $keluar->tambah();
            break;
        case 'hapus_barangkeluar':
            $keluar->hapus();
            break;
            # Page Barang Keluar

            # Page Gudang
        case 'tambahgudang':
            require_once("../gudang/tambah.php");
            break;
        case 'ubahgudang':
            require_once("../gudang/ubah.php");
            break;
        case 'tambah_gudang':
            $gudang->tambah();
            break;
        case 'ubah_gudang':
            $gudang->ubah();
            break;
        case 'hapus_gudang':
            $gudang->hapus();
            break;
            # Page Gudang

            # Page Jenis Barang
        case 'tambah-jenis':
            $jenisbarang->tambah();
            break;
        case 'hapus_jenis':
            $jenisbarang->hapus();
            break;
            # Page Jenis Barang

            # Page Satuan Barang
        case 'tambah-satuan':
            $satuanbarang->tambah();
            break;
        case 'hapus_satuan':
            $satuanbarang->hapus();
            break;
            # Page Satuan Barang

            # Page Supplier
        case 'tambah-supplier':
            require_once("../supplier/tambah.php");
            break;
        case 'ubah-supplier':
            require_once("../supplier/ubah.php");
            break;
        case 'tambah_supplier':
            $supply->tambah();
            break;
        case 'ubah_supplier':
            $supply->ubah();
            break;
        case 'hapus_supplier':
            $supply->hapus();
            break;
            # Page Supplier

        default:
            require_once("../../../controller/controller.php");
            break;
    }
}