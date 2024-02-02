<?php
    $id = $_GET['id'];
    $query = $conn->query('SELECT * FROM pengaduan WHERE id="' . $id . '"');
    $data = $query->fetch_object();

    $tanggapan = $conn->query('SELECT * FROM tanggapan WHERE pengaduan_id="' . $data->id . '"');
?>

<div class="d-flex justify-content-between align-items-center mb-2 border-bottom border-warning border-2">
    <!-- <p class="pt-0 fs-5 mb-0">Details Report</p> -->
    <h5 class="text-secondary mb-0">Details Report</h5>
    
    <?php
        if ($data->status == 0) {
            echo '<span class="badge text-bg-danger">Belum di tanggapi</span>';
        } elseif ($data->status == 'proses') {
            echo '<span class="badge text-bg-warning">Laporan di proses</span>';
        } else {
            echo '<span class="badge text-bg-success">Laporan selesai</span>';
        }
    ?>
</div>

<div class="bg-success bg-opacity-10 rounded-bottom-3">
    <?= $data->image ?>
    <img src="assets/images-report/<?= $data->image ?>" class="img-fluid rounded-top-3">
    <p class="fst-italic small mt-2 p-2 mb-0 pb-0">
        <?php
            $fmt = datefmt_create(
                'id_ID',
                IntlDateFormatter::FULL,
                IntlDateFormatter::FULL,
                'Asia/Makassar',
                IntlDateFormatter::GREGORIAN,
            );
            datefmt_set_pattern($fmt, 'EEEE, d MMMM y HH:mm:ss');
            echo datefmt_format($fmt, strtotime($data->date));            
        ?>
    </p>
    <p class="p-2"><?= $data->report ?></p>
</div>

<?php if ($tanggapan->num_rows > 0) { ?>
    <!-- <p class="pt-0 fs-5">Details Report</p> -->
    <h5 class="border-bottom border-warning border-2 text-secondary">Tanggapan Petugas</h5>
    <?php while ($result = $tanggapan->fetch_object()) { ?>
        <div class="bg-warning bg-opacity-10 rounded-bottom-3">
            <p class="p-2"><?= $result->tanggapan ?></p>
        </div>
    <?php }
    }
?>