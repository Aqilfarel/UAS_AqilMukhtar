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
                <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_obat']; ?>">
            <?php
            }
            ?>

            <div class="from-group">
                <label for="id_obat">Kode Obat</label>
                <input type="text" name="id_obat" id="id_obat" value="<?php echo empty(set_value('id_obat')) ? (empty($edit_data['id_obat']) ? "" : $edit_data['id_obat']) : set_value('id_obat'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" value="<?php echo empty(set_value('nama_obat')) ? (empty($edit_data['nama_obat']) ? "" : $edit_data['nama_obat']) : set_value('nama_obat'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="ket_obat">Ket Obat</label>
                <input type="text" name="ket_obat" id="ket_obat" value="<?php echo empty(set_value('ket_obat')) ? (empty($edit_data['ket_obat']) ? "" : $edit_data['ket_obat']) : set_value('ket_obat'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="satuan_obat">Satuan Obat</label>
                <input type="text" name="satuan_obat" id="satuan_obat" value="<?php echo empty(set_value('satuan_obat')) ? (empty($edit_data['satuan_obat']) ? "" : $edit_data['satuan_obat']) : set_value('satuan_obat'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="stok_obat">Stok Obat</label>
                <input type="text" name="stok_obat" id="stok_obat" value="<?php echo empty(set_value('stok_obat')) ? (empty($edit_data['stok_obat']) ? "" : $edit_data['stok_obat']) : set_value('stok_obat'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="text" name="harga_beli" id="harga_beli" value="<?php echo empty(set_value('harga_beli')) ? (empty($edit_data['harga_beli']) ? "" : $edit_data['harga_beli']) : set_value('harga_beli'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" name="harga_jual" id="harga_jual" value="<?php echo empty(set_value('harga_jual')) ? (empty($edit_data['harga_jual']) ? "" : $edit_data['harga_jual']) : set_value('harga_jual'); ?>" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
        </div>
    </form>
</div>
<?php
echo $this->endSection();
