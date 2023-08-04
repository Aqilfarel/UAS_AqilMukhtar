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


                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/pasien/tambah"><i class="fa-solid fa-plus"></i>Tambah Pasien</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Kode Dokter</th>
                            <th>Kode Obat</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Keluhan Penyakit</th>
                            <th>Tgl Periksa</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $ambildata = mysqli_query($con, "SELECT * FROM pasien INNER JOIN dokter ON pasien.id_dokter = dokter.id_dokter INNER JOIN obat ON pasien.id_obat = obat.id_obat");
                        while ($tampil = mysqli_fetch_array($ambildata)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $tampil['id_pasien']; ?></td>
                                <td><?php echo $tampil['nama_pasien']; ?></td>
                                <td><?php echo $tampil['id_dokter']; ?></td>
                                <td><?php echo $tampil['id_obat']; ?></td>
                                <td><?php echo $tampil['jenis_kelamin']; ?></td>
                                <td><?php echo $tampil['umur']; ?></td>
                                <td><?php echo $tampil['keluhan_penyakit']; ?></td>
                                <td><?php echo $tampil['tgl_periksa']; ?></td>
                                <td><?php echo $tampil['alamat']; ?></td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/pasien/edit/<?php echo $tampil['id_pasien']; ?>"><i class="fa-solid fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $tampil['id_pasien']; ?>);"><i class="fa-solid fa-trash"></i></a>
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
                window.location.href = '<?php echo base_url(); ?>/pasien/hapus/' + id;
            }
        })
    }
</script>
<?php
echo $this->endSection();
