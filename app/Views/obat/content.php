<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                if (session()->getFlashdata('success')) {
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success</h5>
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php
                }
                ?>


                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/obat/tambah"><i class="fa-solid fa-plus"></i>Tambah Obat</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Ket Obat</th>
                            <th>Satuan Obat</th>
                            <th>Stok Obat</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_obat as $r) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r['id_obat']; ?></td>
                                <td><?php echo $r['nama_obat']; ?></td>
                                <td><?php echo $r['ket_obat']; ?></td>
                                <td><?php echo $r['satuan_obat']; ?></td>
                                <td><?php echo $r['stok_obat']; ?></td>
                                <td><?php echo $r['harga_beli']; ?></td>
                                <td><?php echo $r['harga_jual']; ?></td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/obat/edit/<?php echo $r['id_obat']; ?>"><i class="fa-solid fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['id_obat']; ?>);"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    function hapusConfig(id) {
        Swal.fire({
            title: 'Anda yakin akan menghapus data ini?',
            text: "Data akan di hapus secara permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo base_url(); ?>/obat/hapus/' + id;
            }
        })
    }
</script>
<?php
echo $this->endSection();
