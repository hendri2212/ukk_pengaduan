<?php $query = $conn->query("SELECT * FROM petugas") ?>
<div class="bg-body-tertiary mt-2 p-3">
    <h4>Data Masyarakat</h4>
    <div class="col-6">
        <form action="../simpan_petugas" method="post">
            <div class="mb-3">
                <label for="">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="">Whatsapp</label>
                <input type="text" name="telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>