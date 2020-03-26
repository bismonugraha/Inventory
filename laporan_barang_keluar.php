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
                        <strong>Laporan Barang Keluar</strong>
                    </div>
                    <div class="card-body card-block">
                        <form method="post" action="models/laporan/barang_keluar.php">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="tglm" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="tgls" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label><br>
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>