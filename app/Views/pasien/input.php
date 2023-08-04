<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo $title_card; ?></h3>
    </div>
    <!-- /.card-header -->


    <form action="<?php echo $action; ?>" method="post">
        <div class="card-body">
            <?php if (validation_errors()) {
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <?php echo validation_list_errors() ?>
                </div>
            <?php
            }
            ?>

            <?php
            if (session()->getFlashdata('error')) {
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-warning"></i> Error</h5>
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php
            }
            ?>

            <?php echo csrf_field() ?>
            <?php
            if (current_url(true)->getSegment(2) == 'edit') {
            ?>
                <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_pasien']; ?>">
            <?php
            }
            ?>
            <div class="from-group">
                <label for="id_pasien">Kode Pasien</label>
                <input type="text" name="id_pasien" id="id_pasien" value="<?php echo empty(set_value('id_pasien')) ? (empty($edit_data['id_pasien']) ? "" : $edit_data['id_pasien']) : set_value('id_pasien'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" name="nama_pasien" id="nama_pasien" value="<?php echo empty(set_value('nama_pasien')) ? (empty($edit_data['nama_pasien']) ? "" : $edit_data['nama_pasien']) : set_value('nama_pasien'); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="id_dokter">Pilih Id Dokter</label>
                <div class="col-sm-14">
                    <select name="id_dokter" class="form-control">
                        <option value="">--Pilih id Dokter--</option>
                        <?php
                        include "koneksi.php";
                        $query_dokter = mysqli_query($con, "SELECT * FROM dokter") or die(mysqli_error($con));
                        while ($data_dokter = mysqli_fetch_array($query_dokter)) {
                            echo "<option value = $data_dokter[id_dokter]> $data_dokter[id_dokter]</option>";
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_obat">Pilih Id Obat</label>
                <div class="col-sm-14">
                    <select name="id_obat" class="form-control">
                        <option value="">--Pilih id Obat--</option>
                        <?php
                        include "koneksi.php";
                        $query_obat = mysqli_query($con, "SELECT * FROM obat") or die(mysqli_error($con));
                        while ($data_obat = mysqli_fetch_array($query_obat)) {
                            echo "<option value = $data_obat[id_obat]> $data_obat[id_obat]</option>";
                        } ?>
                    </select>
                </div>
            </div>
            <div class="from-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo empty(set_value('jenis_kelamin')) ? (empty($edit_data['jenis_kelamin']) ? "" : $edit_data['jenis_kelamin']) : set_value('jenis_kelamin'); ?>" aria-label="Default select example" name="Jenis_Kelamin" class="form-select">
                    <option value=""></option>
                    <option value="pria">pria</option>
                    <option value="wanita">wanita</option>
                </select>
            </div>
            <div class="from-group">
                <label for="umur">Umur</label>
                <input type="number" name="umur" id="umur" value="<?php echo empty(set_value('umur')) ? (empty($edit_data['umur']) ? "" : $edit_data['umur']) : set_value('umur'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="keluhan_penyakit">Keluhan Penyakit</label>
                <input type="text" name="keluhan_penyakit" id="keluhan_penyakit" value="<?php echo empty(set_value('keluhan_penyakit')) ? (empty($edit_data['keluhan_penyakit']) ? "" : $edit_data['keluhan_penyakit']) : set_value('keluhan_penyakit'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="tgl_periksa">Tgl Periksa</label>
                <input type="date" name="tgl_periksa" id="tgl_periksa" value="<?php echo empty(set_value('tgl_periksa')) ? (empty($edit_data['tgl_periksa']) ? "" : $edit_data['tgl_periksa']) : set_value('tgl_periksa'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo empty(set_value('alamat')) ? (empty($edit_data['alamat']) ? "" : $edit_data['alamat']) : set_value('alamat'); ?>" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
        </div>
    </form>
</div>
<?php
echo $this->endSection();
