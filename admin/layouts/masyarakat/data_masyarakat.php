<?php $query = $conn->query("SELECT * FROM masyarakat") ?>
<div class="bg-body-tertiary mt-2 p-3">
    <h3>Data Masyarakat</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">NIK</th>
                <th scope="col">Full Name</th>
                <th scope="col">Whatsapp</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while ($data = $query->fetch_object()) { ?>
                <tr>
                    <th scope="row" class="text-center"><?= $no++ ?></th>
                    <td><?= $data->nik ?></td>
                    <td><?= $data->name ?></td>
                    <td><?= $data->telp ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>