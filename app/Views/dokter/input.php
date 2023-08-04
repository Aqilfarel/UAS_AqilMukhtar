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
                <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_dokter']; ?>">
            <?php
            }
            ?>

            <div class="from-group">
                <label for="id_dokter">Kode Dokter</label>
                <input type="text" name="id_dokter" id="id_dokter" value="<?php echo empty(set_value('id_dokter')) ? (empty($edit_data['id_dokter']) ? "" : $edit_data['id_dokter']) : set_value('id_dokter'); ?>" class="form-control">
            </div>
            <div class="from-group">
                <label for="nama_dokter">Nama Dokter</label>
                <input type="text" name="nama_dokter" id="nama_dokter" value="<?php echo empty(set_value('nama_dokter')) ? (empty($edit_data['nama_dokter']) ? "" : $edit_data['nama_dokter']) : set_value('nama_dokter'); ?>" class="form-control">
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
                <label for="spesialis">Spesialis</label>
                <select class="form-control" name="spesialis" id="spesialis" value="<?php echo empty(set_value('spesialis')) ? (empty($edit_data['spesialis']) ? "" : $edit_data['spesialis']) : set_value('spesialis'); ?>" aria-label="Default select example" name="Spesialis" class="form-select">
                    <option value=""></option>
                    <option value="UMM_(Umum)">UMM_(Umum)</option>
                    <option value="DLM_(Dalam)">DLM_(Dalam)</option>
                    <option value="BDH_(Bedah)">BDH_(Bedah)</option>
                    <option value="JTG_(Jantung)">JTG_(Jantung)</option>
                    <option value="KDG_(Kandungan)">KDG_(Kandungan)</option>
                    <option value="SRF_(Saraf)">SRF_(Saraf)</option>
                    <option value="ANK_(Anak)">ANK_(Anak)</option>
                    <option value="MAT_(Mata)">MAT_(Mata)</option>
                    <option value="THG_(Telinga,Hidung)">THG_(Telinga,Hidung)</option>
                    <option value="GIG_(Gigi)">GIG_(Gigi)</option>
                    <option value="KLT_(Kulit)">KLT_(Kulit)</option>
                </select>
            </div>
            <div class="from-group">
                <label for="no_hp">No Hp</label>
                <input type="text" name="no_hp" id="no_hp" value="<?php echo empty(set_value('no_hp')) ? (empty($edit_data['no_hp']) ? "" : $edit_data['no_hp']) : set_value('no_hp'); ?>" class="form-control">
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
