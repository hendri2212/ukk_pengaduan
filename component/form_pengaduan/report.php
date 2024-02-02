<p class="rounded-3 fs-5">Silahkan kirimkan gambar dan tuliskan laporan Anda secara detail melalui form di bawah ini</p>
<form action="save_report" method="POST" enctype="multipart/form-data">
    <div class="p-2 bg-success bg-opacity-10 rounded-3">
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" accept="image/*" capture="environment" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Isi Laporan</label>
            <textarea class="form-control" name="report" rows="3"></textarea>
        </div>
        <div class="clearfix">
            <div class="btn-group float-end">
                <button type="button" class="btn btn-warning" onclick="history.back()">Batal</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>

        </div>
    </div>
</form>