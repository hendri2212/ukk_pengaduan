<?php $query = $conn->query("SELECT * FROM pengaduan WHERE nik='".$_SESSION['nik']."'") ?>

<p class="mb-0 pb-0 fs-5 text-primary fw-bold">Hai... <?= $_SESSION['name'] ?></p>
<p class="pt-0 fs-5">Melalui aplikasi <span class="fw-bold text-danger">e-Pengaduan</span>, Anda dapat melaporkan setiap kejadian di sekitar Anda dengan mudah dan cepat</p>

<div class="d-flex justify-content-between align-items-center">
    <a href="report" class="btn btn-primary">Buat Laporan</a>
    <a href="logout" class="fw-bold text-decoration-none btn btn-outline-warning btn-sm border-0">Logout</a>
</div>
<h5 class="border-bottom pt-2 border-warning border-2 text-secondary">Laporan Anda</h5>

<?php while ($data = $query->fetch_object()) { ?>
    <a href="details?id=<?= $data->id ?>" class="text-decoration-none text-reset">
        <div class="my-2 p-2 bg-success bg-opacity-10 rounded-3">
            <p class="fst-italic small mb-2">
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
            <div class="d-flex">
                <div class="col p-0">
                    <img class="img-fluid img-thumbnail" src="assets/images-report/<?= $data->image ?>">
                </div>
                <div class="col-8 p-0 lh-sm" style="margin-left: 5px">
                    <?= $data->report ?>
                </div>
            </div>
        </div>
    </a>
<?php } ?>