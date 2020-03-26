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
                        <strong>Tambah User</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="models/manage_user/tambah.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class=" form-control-label">Username</label>
                                        <input type="text" id="username" name="username" class="form-control">
                                    </div>
                                    <div class="form-group"><label class=" form-control-label">Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class=" form-control-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group"><label for="file-input" class=" form-control-label">Upload Foto Profil</label>
                                        <input type="file" id="image" name="image" class="form-control-file">
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
                        <strong class="card-title">Data User</strong>
                        <div class="float-right">
                            <a href="cetak_barang.php" type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Password</th>
                                    <th>Gambar</th>
                                    <th></th>
                                </tr>
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM user");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td><?= $data['nama_lengkap']; ?></td>
                                    <td><?= $data['password']; ?></td>
                                    <td><img src="upload/<?= $data['image']; ?>" width="50" height="50"></td>
                                    <td style="text-align:center">
                                        <a href="#" type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data['id_user']; ?>">
                                            <i class=" fa fa-pencil"></i>
                                        </a>
                                        <a href="#" type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $data['id_user']; ?>">
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
@session_start();
include 'security.php';
include 'koneksi.php';
$no = 1;
$sql = mysqli_query($koneksi, "SELECT * FROM user");
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="modal fade" id="editModal<?= $data['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/manage_user/edit.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id_user" id="id_user" value="<?= $data['id_user']; ?>">
                                <div class="form-group"><label class=" form-control-label">Username</label>
                                    <input type="text" id="username" name="username" value="<?= $data['username']; ?>" class="form-control">
                                </div>
                                <div class="form-group"><label class=" form-control-label">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $data['nama_lengkap']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label class=" form-control-label">Password</label>
                                    <input type="password" id="password" name="password" value="<?= $data['password']; ?>" class="form-control">
                                </div>
                                <div class="form-group"><label for="file-input" class=" form-control-label">Upload Foto Profil</label>
                                    <input type="file" id="image" name="image" value="<?= $data['image']; ?>" class="form-control-file">
                                    <br>
                                    <img src="upload/<?= $data['image']; ?>" width="100" height="100" alt="">
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

    <div class="modal fade" id="hapusModal<?= $data['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Hapus Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="models/manage_user/hapus.php" method="post">
                        <div>
                            <input type="hidden" id="id_user" name="id_user" class="form-control" value="<?= $data['id_user']; ?>">
                            <h6>
                                Hapus Username <i><?= $data['username']; ?></i> ?
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