<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Limbah</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=proses-add-limbah" class="form-horizontal">
                    <div class="form-group">
                        <label for="jenis_limbah" class="control-label">Jenis Limbah:</label><br>
                        <input type="text" id="jenis_limbah" name="jenis_limbah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="waktu_pengangkutan" class="control-label">Waktu Pengangkutan:</label>
                        <input type="datetime-local" id="waktu_pengangkutan" class="form-control" name="waktu_pengangkutan">
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="control-label">Keterangan:</label>
                        <!-- <input type="text" id="keterangan" name="keterangan" class="form-control"> -->
                        <select name="keterangan" id="" class="form-control">
                            <option value="Di Ambil" >Di Ambil</option>
                            <option value="Di Antar">Di Antar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="control-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat..." required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="control-label">Jumlah:</label><br>
                        <input type="number" id="jumlah" class="form-control" name="jumlah">
                    </div>
                    <input type="submit" value="Tambah" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>