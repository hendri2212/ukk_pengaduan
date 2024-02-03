<?php $query = $conn->query("SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik") ?>
<div class="bg-body-tertiary mt-2 p-3">
    <h4>Pengaduan Masuk</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Date</th>
                <th scope="col">Full Name</th>
                <th scope="col" colspan="3">Report</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while ($data = $query->fetch_object()) { ?>
                <tr>
                    <th scope="row" class="text-center"><?= $no++ ?></th>
                    <td class="text-nowrap">
                        <?php
                            if ($data->status == 0) {
                                echo '<div class="d-grid">';
                                    echo '<span class="badge text-bg-danger rounded-0">Belum di tanggapi</span>';
                                echo '</div>';
                            } elseif ($data->status == 'proses') {
                                echo '<div class="d-grid">';
                                    echo '<span class="badge text-bg-warning rounded-0">Laporan di proses</span>';
                                echo '</div>';
                            } else {
                                echo '<div class="d-grid">';
                                    echo '<span class="badge text-bg-success rounded-0">Laporan selesai</span>';
                                echo '</div>';
                            }
                            echo "<br>";

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
                    </td>
                    <td class="text-nowrap"><?= $data->name ?></td>
                    <td><?= $data->report ?></td>
                    <td class="text-center col-1"><img src="../assets/images-report/<?= $data->image ?>" class="w-50"></td>
                    <td>
                        <?php if ($data->status == 0) { ?>
                            <a href="process?id=<?= $data->id ?>"><span class="badge rounded-pill text-bg-info mb-2">Accept Report</span></a>
                        <?php } elseif ($data->status == 'proses') { ?>
                            <a href="finish?id=<?= $data->id ?>"><span class="badge rounded-pill text-bg-secondary mb-2">Finish Report</span></a>
                        <?php } ?>
                        <br>
                        <?php if ($data->status != 0) { ?>
                            <a href="details?id=<?= $data->id ?>" class="btn btn-primary btn-sm">Details Report</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>