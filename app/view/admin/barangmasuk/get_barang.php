<?php
include("../../../config/config.php");
$tamp = $_POST['tamp'];
$pecah_bar = explode(".", $tamp);
$kode_bar = $pecah_bar[0];
$sql = "SELECT * FROM gudang where kode_barang = '$kode_bar'";
$result = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) :
?>
<div class="form-group my-2">
    <div class="form-inline row justify-content-center align-items-center flex-wrap">
        <div class="form-label col-sm-4 col-md-4">
            <label for="">Stok</label>
        </div>
        <div class="col-sm-1">:</div>
        <div class="col-sm-5 col-md-5">
            <input readonly="readonly" id="stok" type="number" class="form-control"
                value="<?php echo $row["jumlah"]; ?>">
            </input>
        </div>
    </div>
</div>
<?php
    endwhile;
} else {
    echo "0 results";
}

mysqli_close($koneksi);

?>