<?php

function terlambat($tanggal_dateline, $tanggal_kembali)
{

    $tanggal_dateline_pecah = explode("-", $tanggal_dateline);
    $tanggal_dateline_pecah = $tanggal_dateline_pecah[2] . "-" . $tanggal_dateline_pecah[1] . "-" . $tanggal_dateline_pecah[0];

    $tanggal_kembali_pecah = explode("-", $tanggal_kembali);
    $tanggal_kembali_pecah = $tanggal_kembali_pecah[2] . "-" . $tanggal_kembali_pecah[1] . "-" . $tanggal_kembali_pecah[0];

    $selisih = strtotime($tanggal_kembali_pecah) - strtotime($tanggal_dateline_pecah);
    $selisih = $selisih / 86400;

    if ($selisih >= 1) {
        $hasil_tanggal = floor($selisih);
    } else {
        $hasil_tanggal = 0;
    }
    return  $hasil_tanggal;
}

date_default_timezone_set("Asia/Jakarta");
$haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
$bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$bulans_count = count($bulans);
// tanggal bulan dan tahun hari ini
$hari_ini = $haries[date("l")];
$bulan_ini = $bulans[date("n")];
$tanggal = date("d");
$bulan = date("m");
$tahun = date("Y");

# Gudang, Barang Masuk, Barang Keluar, Supplier
function buatKode($tabel, $field, $inisial)
{
    # buat kode ...
    global $koneksi;
    $struktur = $koneksi->query("SELECT * FROM $tabel LIMIT 1");
    $field = mysqli_fetch_field_direct($struktur, 1)->name;
    $mysql = $koneksi->query("SELECT MAX($field) as $field FROM $tabel order by $field desc");
    $row = mysqli_fetch_array($mysql);

    $urut = substr($row[$field], 8, 3);
    $tambah = (int)$urut + 1;
    $bulan = date('m');
    $tahun = date('y');

    if (strlen($tambah) == 1) {
        return $inisial . $bulan . $tahun . '00' . $tambah;
    } elseif (strlen($tambah) == 2) {
        return $inisial . $bulan . $tahun . '0' . $tambah;
    } else {
        return $inisial . $bulan . $tahun . $tambah;
    }
}