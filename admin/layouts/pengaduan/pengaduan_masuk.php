<?php $query = $conn->query("SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE status='0'") ?>
<div class="bg-body-tertiary mt-2 p-3">
    <h4>Pengaduan Masuk</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Full Name</th>
                <th scope="col" colspan="3">Report</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while ($data = $query->fetch_object()) { ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td class="text-nowrap">
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
                    </td>
                    <td class="text-nowrap"><?= $data->name ?></td>
                    <td><?= $data->report ?></td>
                    <td class="text-center col-1"><img src="../assets/images-report/<?= $data->image ?>" class="w-50"></td>
                    <td class="text-center">
                        <a href="details_laporan?id=<?= $data->id ?>"><span class="badge text-bg-primary">View</span></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>