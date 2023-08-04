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


                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/dokter/tambah"><i class="fa-solid fa-plus"></i>Tambah Dokter</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode Dokter</th>
                            <th>Nama Dokter</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Spesialis</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_dokter as $r) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r['id_dokter']; ?></td>
                                <td><?php echo $r['nama_dokter']; ?></td>
                                <td><?php echo $r['jenis_kelamin']; ?></td>
                                <td><?php echo $r['umur']; ?></td>
                                <td><?php echo $r['spesialis']; ?></td>
                                <td><?php echo $r['no_hp']; ?></td>
                                <td><?php echo $r['alamat']; ?></td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/dokter/edit/<?php echo $r['id_dokter']; ?>"><i class="fa-solid fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['id_dokter']; ?>);"><i class="fa-solid fa-trash"></i></a>
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
                window.location.href = '<?php echo base_url(); ?>/dokter/hapus/' + id;
            }
        })
    }
</script>
<?php
echo $this->endSection();
