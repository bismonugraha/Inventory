<?php
@session_start();
include 'security.php';
include 'header.php';
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Tambah Barang</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="models/barang/tambah.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class=" form-control-label">Kode Barang</label>
                                        <input type="text" id="kode_barang" name="kode_barang" class="form-control">
                                    </div>
                                    <div class="form-group"><label class=" form-control-label">Nama Barang</label>
                                        <input type="text" id="nama_barang" name="nama_barang" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="select" class=" form-control-label">Jenis Barang</label>
                                        <select name="jenis_barang" id="jenis_barang" class="form-control">
                                            <option value="">Please select</option>
                                            <option value="Makanan">Makanan</option>
                                            <option value="Kandang">Kandang</option>
                                            <option value="Aksesoris">Aksesoris</option>
                                        </select>
                                    </div>
                                    <div class="form-group"><label class=" form-control-label">Stok</label>
                                        <input type="number" id="stok" name="stok" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Barang</strong>
                        <div class="float-right">
                            <a href="cetak_barang.php" type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Stok</th>
                                    <th></th>
                                </tr>
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM barang");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['kode_barang']; ?></td>
                                    <td><?= $data['nama_barang']; ?></td>
                                    <td><?= $data['jenis_barang']; ?></td>
                                    <td><?= $data['stok']; ?></td>
                                    <td style="text-align:center">
                                        <a href="#" type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data['kode_barang']; ?>">
                                            <i class=" fa fa-pencil"></i>
                                        </a>
                                        <a href="#" type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $data['kode_barang']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'koneksi.php';
$no = 1;
$sql = mysqli_query($koneksi, "SELECT * FROM barang");
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="modal fade" id="editModal<?= $data['kode_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/barang/edit.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label class=" form-control-label">Kode Barang</label>
                                    <input type="text" id="kode_barang" name="kode_barang" class="form-control" value="<?= $data['kode_barang']; ?>">
                                </div>
                                <div class="form-group"><label class=" form-control-label">Nama Barang</label>
                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="<?= $data['nama_barang']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label for="select" class=" form-control-label">Jenis Barang</label>
                                    <select name="jenis_barang" id="jenis_barang" class="form-control">
                                        <?php
                                        $jenis_barang = $data['jenis_barang'];
                                        if ($jenis_barang == "Makanan") echo "<option value='Makanan' selected>Makanan</option>";
                                        else echo "<option value='Makanan'>Makanan</option>";
                                        if ($jenis_barang == "Kandang") echo "<option value='Kandang' selected>Kandang</option>";
                                        else echo "<option value='Kandang'>Kandang</option>";
                                        if ($jenis_barang == "Aksesoris") echo "<option value='Aksesoris' selected>Aksesoris</option>";
                                        else echo "<option value='Aksesoris'>Aksesoris</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group"><label class=" form-control-label">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control" value="<?= $data['stok']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusModal<?= $data['kode_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Hapus Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/barang/hapus.php" method="post">
                        <div>
                            <input type="hidden" id="kode_barang" name="kode_barang" class="form-control" value="<?= $data['kode_barang']; ?>">
                            <h6>
                                Hapus <?= $data['jenis_barang']; ?> <i><?= $data['nama_barang']; ?></i> ?
                            </h6>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                            <button type="cancel" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Tidak
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<?php include 'footer.php'; ?>