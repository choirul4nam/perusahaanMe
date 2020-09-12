<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title ?> </h1>
    </div>

    <a href="<?= base_url('jabatan/tambahData') ?>" class="btn btn-primary mb-3 mt-3">Tambah Data</a>

    <?= $this->session->flashdata('message'); ?>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID JABATAN</th>
                    <th>NAMA JABATAN</th>
                    <th>ACTION</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataJabatan as $a) : ?>
                    <tr>
                        <td><?= $a['id_jabatan'] ?></td>
                        <td><?= $a['nama_jabatan'] ?></td>
                        <td>
                            <a href="<?= base_url('jabatan/updateData/') . $a['id_jabatan'] ?>" onclick="return confirm('YAKIN MAU DI UBAH ?')" class="btn btn-success">UBAH</a>
                            <a href="<?= base_url('jabatan/hapus/') . $a['id_jabatan'] ?>" onclick="return confirm('YAKIN MAU DI HAPUS ?')" class="btn btn-danger">DELETE</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->