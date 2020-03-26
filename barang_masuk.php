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
                        <strong>Tambah Barang Masuk</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="models/barang_masuk/tambah.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class=" form-control-label">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                                    </div>
                                    <div class="form-group"><label for="select" class=" form-control-label">Nama Barang</label>
                                        <select name="kode_barang" id="kode_barang" class="form-control">
                                            <option value="">... Pilih ...</option>
                                            <?php
                                            include 'koneksi.php';
                                            $sql_nilai = mysqli_query($koneksi, "SELECT * FROM barang") or die(mysqli_error($con));
                                            while ($data_nilai = mysqli_fetch_array($sql_nilai)) {
                                                echo '<option value="' . $data_nilai['kode_barang'] . '">' . $data_nilai['nama_barang'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label for="select" class=" form-control-label">Nama Supplier</label>
                                        <select name="id_supplier" id="id_supplier" class="form-control">
                                            <option value="">... Pilih ...</option>
                                            <?php
                                            include 'koneksi.php';
                                            $sql_nilai = mysqli_query($koneksi, "SELECT * FROM supplier") or die(mysqli_error($con));
                                            while ($data_nilai = mysqli_fetch_array($sql_nilai)) {
                                                echo '<option value="' . $data_nilai['id_supplier'] . '">' . $data_nilai['nama_supplier'] . '</option>';
                                            }
                                            ?>
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group"><label class=" form-control-label">Jumlah Masuk</label>
                                        <input type="number" id="jml_masuk" name="jml_masuk" class="form-control">
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
                        <strong class="card-title">Barang Masuk</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Nama Supplier</th>
                                    <th>Jumlah Masuk</th>
                                    <th></th>
                                </tr>
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT barang.kode_barang, barang.nama_barang, barang.jenis_barang, 
                                    supplier.nama_supplier, barang_masuk.jumlah_masuk, DATE_FORMAT(tanggal, '%d %M %Y') AS tanggal FROM barang_masuk
                                    INNER JOIN barang ON barang_masuk.kode_barang = barang.kode_barang
                                    INNER JOIN supplier ON barang_masuk.id_supplier = supplier.id_supplier ORDER BY tanggal DESC");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['tanggal']; ?></td>
                                    <td><?= $data['kode_barang']; ?></td>
                                    <td><?= $data['nama_barang']; ?></td>
                                    <td><?= $data['jenis_barang']; ?></td>
                                    <td><?= $data['nama_supplier']; ?></td>
                                    <td><?= $data['jumlah_masuk']; ?></td>
                                    <td style="text-align:center">
                                        <a href="#" type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data['id_barang_masuk']; ?>">
                                            <i class=" fa fa-pencil"></i>
                                        </a>
                                        <a href="#" type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $data['id_barang_masuk']; ?>">
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
    </div><!-- .animated -->
</div><!-- .content -->

<?php
include 'koneksi.php';
$no = 1;
$sql = mysqli_query($koneksi, "SELECT * FROM barang_masuk
    INNER JOIN barang ON barang_masuk.kode_barang = barang.kode_barang");
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="modal fade" id="editModal<?= $data['id_barang_masuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Barang Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/barang_masuk/edit.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id_barang_masuk" id="id_barang_masuk" value="<?= $data['id_barang_masuk']; ?>">
                                <div class="form-group"><label class=" form-control-label">Tanggal</label>
                                    <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal']; ?>" class="form-control">
                                </div>
                                <div class="form-group"><label for="select" class=" form-control-label">Nama Barang</label>
                                    <select name="kode_barang" id="kode_barang" class="form-control">
                                        <option value="">... Pilih ...</option>
                                        <?php
                                        include 'koneksi.php';
                                        $sql_nilai = mysqli_query($koneksi, "SELECT * FROM barang");
                                        while ($data_nilai = mysqli_fetch_array($sql_nilai)) {
                                            if ($data_nilai['kode_barang'] == $data['kode_barang']) {
                                        ?>
                                                <option value="<?= $data_nilai['kode_barang']; ?>" selected>
                                                    <?= $data_nilai['nama_barang']; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $data_nilai['kode_barang']; ?>">
                                                    <?= $data_nilai['nama_barang']; ?> </option>
                                                }
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label for="select" class=" form-control-label">Nama Supplier</label>
                                    <select name="id_supplier" id="id_supplier" class="form-control">
                                        <option value="">... Pilih ...</option>
                                        <?php
                                        include 'koneksi.php';
                                        $sql_nilai = mysqli_query($koneksi, "SELECT * FROM supplier");
                                        while ($data_nilai = mysqli_fetch_array($sql_nilai)) {
                                            if ($data_nilai['id_supplier'] == $data['id_supplier']) {
                                        ?>
                                                <option value="<?= $data_nilai['id_supplier']; ?>" selected>
                                                    <?= $data_nilai['nama_supplier']; ?> </option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $data_nilai['id_supplier']; ?>">
                                                    <?= $data_nilai['nama_supplier']; ?> </option>
                                                }
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group"><label class=" form-control-label">Jumlah Masuk</label>
                                    <input type="number" id="jml_masuk" name="jml_masuk" value="<?= $data['jumlah_masuk']; ?>" class="form-control">
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
    </div>

    <div class="modal fade" id="hapusModal<?= $data['id_barang_masuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Hapus Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/barang_masuk/hapus.php" method="post">
                        <div>
                            <input type="hidden" id="id_barang_masuk" name="id_barang_masuk" class="form-control" value="<?= $data['id_barang_masuk']; ?>">
                            <h6>
                                Hapus Barang Masuk <?= $data['jenis_barang']; ?> <i><?= $data['nama_barang']; ?></i> ?
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