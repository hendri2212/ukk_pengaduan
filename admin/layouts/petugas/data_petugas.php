<?php $query = $conn->query("SELECT * FROM petugas") ?>
<div class="bg-body-tertiary mt-2 p-3">
    <div class="d-flex justify-content-between mb-2">
        <h4>Data Masyarakat</h4>
        <?php if($_SESSION['level'] == 'admin') { ?>
            <a href="petugas/add" class="btn btn-primary">Tambah Petugas</a>
        <?php } ?>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Whatsapp</th>
                <th scope="col" colspan="2">Level</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while ($data = $query->fetch_object()) { ?>
                <tr>
                    <th scope="row" class="text-center"><?= $no++ ?></th>
                    <td><?= $data->name ?></td>
                    <td><?= $data->telp ?></td>
                    <td <?= ($_SESSION['level'] != 'admin') ? 'class="border-end-0"' : ''; ?>><?= $data->level ?></td>
                    <?php if($_SESSION['level'] == 'admin'){ ?>
                    <td class="border-start-0">
                        <?php if($data->id != 1){ ?>
                        <div class="btn-group float-end">
                            <input type="button" value="Jadikan Admin" class="btn btn-info btn-sm">
                            <input type="button" value="Edit" class="btn btn-warning btn-sm">
                            <a href="hapus_petugas?id=<?= $data->id ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                        <?php } ?>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>