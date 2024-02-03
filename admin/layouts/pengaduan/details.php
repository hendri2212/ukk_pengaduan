<?php
    $query = $conn->query("SELECT * FROM pengaduan WHERE id='".$_GET['id']."'");
    $data = $query->fetch_object();

    $tanggapan = $conn->query("SELECT * FROM tanggapan JOIN petugas ON tanggapan.petugas_id=petugas.id WHERE pengaduan_id='".$_GET['id']."'");
?>
<div class="bg-body-tertiary mt-2 p-3">
    <div class="d-flex">
        <img src="../assets/images-report/<?= $data->image ?>" class="img-thumbnail w-25 rounded-5">
        <div class="col-8" style="margin-left: 15px">
            <h5>Isi Laporan</h5>
            <?= $data->report ?></div>
    </div>
</div>
<?php if ($data->status!='selesai') { ?>
    <div class="bg-body-tertiary mt-2 p-3">
        <h5>Tanggapan</h5>
        <form action="simpan_tanggapan" method="post">
            <input type="hidden" name="id" value="<?= $data->id ?>">
            <textarea name="tanggapan" class="form-control"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
<?php } ?>
<div class="bg-body-tertiary mt-2 p-3">
    <h5>History Comment</h5>
    <?php while ($row = $tanggapan->fetch_object()) { ?>
        <div class="alert alert-primary" role="alert">
            <?=
                "<span class='fw-bold fst-italic text-secondary'>".$row->name."</span><br>".
                $row->tanggapan
            ?>
        </div>
    <?php  } ?>
</div>