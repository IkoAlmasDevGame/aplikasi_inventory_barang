<?php require_once("../../../config/config.php"); ?>
<script src="<?= baseurl('dist/vendor/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= baseurl('dist/vendor/chart.js/chart.umd.js') ?>"></script>
<script src="<?= baseurl('dist/vendor/echarts/echarts.min.js') ?>"></script>
<script src="<?= baseurl('dist/vendor/quill/quill.js') ?>"></script>
<script src="<?= baseurl('dist/vendor/simple-datatables/simple-datatables.js') ?>"></script>
<script src="<?= baseurl('dist/vendor/tinymce/tinymce.min.js') ?>"></script>
<script src="<?= baseurl('dist/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= baseurl('dist/js/main.js') ?>"></script>

<!-- Template Main JS File -->
<script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
<script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
</script>
<script crossorigin="anonymous" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script crossorigin="anonymous" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script crossorigin="anonymous" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script crossorigin="anonymous">
/* Settings DataTables */
$(document).ready(function() {
    $('#datatable1').DataTable({
        "responsive": true,
        "processing": false,
        "ordering": false,
        "columnDefs": [{
            "orderable": false,
            "targets": [0]
        }]
    });
    $("#datatable1_filter").hide(false);
    // $("#datatable1_filter").hide(true);
    $('#datatable1').parent().addClass("table-responsive");
});

$(document).ready(function() {
    $("#datatable2").DataTable({
        "responsive": true
    });
    $('#datatable2').parent().addClass("table-responsive");
});

$(document).ready(function() {
    $("#datatable3").DataTable({
        "responsive": true,
        "ordering": false
    });
    $("#datatable3_filter").hide(false);
    $("#datatable3_length").hide(false);
    $('#datatable3').parent().addClass("table-responsive");
});

function previewImage(input) {
    const file = input.files[0];
    if (file) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file);
        preview.onload = function() {
            URL.revokeObjectURL(preview.src); // Free memory
        };
    }
}
</script>
<script type="text/javascript">
// Barang Masuk Get Barang -- Barang Masuk --
jQuery(document).ready(function($) {
    $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
            url: '../barangmasuk/get_barang.php', // File yang akan memproses data
            data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
            success: function(data) { // Jika berhasil
                $('.tampung').html(data); // Berikan hasil ke id kota
            }
        });
    });
});
// Barang Masuk Get Satuan -- Barang Masuk --
jQuery(document).ready(function($) {
    $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
            url: '../barangmasuk/get_satuan.php', // File yang akan memproses data
            data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
            success: function(data) { // Jika berhasil
                $('.tampung1').html(data); // Berikan hasil ke id kota
            }
        });
    });
});
// Barang Masuk Get Barang -- Barang Keluar --
jQuery(document).ready(function($) {
    $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
            url: '../barangkeluar/get_barang.php', // File yang akan memproses data
            data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
            success: function(data) { // Jika berhasil
                $('.tampung').html(data); // Berikan hasil ke id kota
            }
        });
    });
});
// Barang Masuk Get Satuan -- Barang Keluar --
jQuery(document).ready(function($) {
    $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
            url: '../barangkeluar/get_satuan.php', // File yang akan memproses data
            data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
            success: function(data) { // Jika berhasil
                $('.tampung1').html(data); // Berikan hasil ke id kota
            }
        });
    });
});
// Export Laporan Barang Masuk Excel
jQuery(document).ready(function($) {
    $(function() {
        $('#Myform1').submit(function() {
            $.ajax({
                type: 'POST',
                url: '?page=export_laporan_barangmasuk_excel',
                data: $(this).serialize(),
                success: function(data) {
                    $(".tampung1").html(data);
                }
            });
            return false;
            e.preventDefault();
        });
    });
});
// Export Barang Keluar Excel
jQuery(document).ready(function($) {
    $(function() {
        $('#Myform2').submit(function() {
            $.ajax({
                type: 'POST',
                url: '?page=export_laporan_barangkeluar_excel',
                data: $(this).serialize(),
                success: function(data) {
                    $(".tampung2").html(data);
                }
            });
            return false;
            e.preventDefault();
        });
    });
});
</script>
</body>

</html>