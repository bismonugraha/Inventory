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
                        <strong>Tambah Supplier</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="models/supplier/tambah.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label class=" form-control-label">Nama Supplier</label>
                                        <input type="text" id="nama_supplier" name="nama_supplier" class="form-control">
                                    </div>
                                    <div class="form-group"><label class=" form-control-label">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group"><label class=" form-control-label">No Telpon</label>
                                        <input type="text" id="no_telp" name="no_telp" class="form-control">
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
                        <strong class="card-title">Data Supplier</strong>
                        <div class="float-right">
                            <a href="cetak_supplier.php" type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Alamat</th>
                                    <th>No.Telepon</th>
                                    <th></th>
                                </tr>
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM supplier");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:center"><?= $no++; ?></td>
                                    <td><?= $data['nama_supplier']; ?></td>
                                    <td><?= $data['alamat']; ?></td>
                                    <td><?= $data['no_telp']; ?></td>
                                    <td style="text-align:center">
                                        <a href="#" type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data['id_supplier']; ?>">
                                            <i class=" fa fa-pencil"></i>
                                        </a>
                                        <a href="#" type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $data['id_supplier']; ?>">
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
$sql = mysqli_query($koneksi, "SELECT * FROM supplier");
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="modal fade" id="editModal<?= $data['id_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/supplier/edit.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="id_supplier" name="id_supplier" class="form-control" value="<?= $data['id_supplier']; ?>">
                                <div class="form-group"><label class=" form-control-label">Nama Supplier</label>
                                    <input type="text" id="nama_supplier" name="nama_supplier" value="<?= $data['nama_supplier']; ?>" class="form-control">
                                </div>
                                <div class="form-group"><label class=" form-control-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?= $data['alamat'] ?></textarea>
                                </div>
                                <div class="form-group"><label class=" form-control-label">No Telpon</label>
                                    <input type="text" id="no_telp" name="no_telp" value="<?= $data['no_telp']; ?>" class="form-control">
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

    <div class="modal fade" id="hapusModal<?= $data['id_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Hapus Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/supplier/hapus.php" method="post">
                        <div>
                            <input type="hidden" id="id_supplier" name="id_supplier" class="form-control" value="<?= $data['id_supplier']; ?>">
                            <h6>
                                Hapus Supplier <i><?= $data['nama_supplier']; ?></i> ?
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