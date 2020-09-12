<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $judul ?> </h1>
    </div>

    <!-- Content Row -->
    <div class="row ml-2">
        <form action="<?= base_url('jabatan/ubah') ?>" method="post">
            <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?= $dataJabatan['id_jabatan'] ?>">
            <input type="hidden" id="namaJabatan2" name="namaJabatan2" value="<?= $dataJabatan['nama_jabatan'] ?>">
            <div class="form-group">
                <label>NAMA JABATAN</label>
                <input id="namaJabatan" name="namaJabatan" class="form-control" value="<?= $dataJabatan['nama_jabatan'] ?>">
            </div>

            <a href="<?= base_url('karywan') ?>" class="btn btn-danger">BATAL</a>
            <button class="btn btn-success" id="tambah" name="tambah">
                UBAH
            </button>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->