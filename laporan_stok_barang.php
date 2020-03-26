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
                        <strong>Laporan Stok Barang</strong>
                    </div>
                    <div class="card-body card-block">
                        <form method="post" action="models/laporan/stok_barang.php">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="form-group"><label for="select" class=" form-control-label">Jenis Barang</label>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control">
                                                <option value="">Please select</option>
                                                <option value="Makanan">Makanan</option>
                                                <option value="Kandang">Kandang</option>
                                                <option value="Aksesoris">Aksesoris</option>
                                            </select>
                                        </div>
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