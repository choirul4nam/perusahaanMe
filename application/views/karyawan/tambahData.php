<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $judul ?> </h1>
    </div>

    <!-- Content Row -->
    <div class="row ml-2">
        <form action="<?= base_url('karywan/tambah') ?>" method="post">
            <div class="form-group">
                <label>NIK</label>
                <input id="nik" name="nik" maxlength="16" class="form-control" required>
            </div>
            <div class="form-group">
                <label>NAMA KARYAWAN</label>
                <input id="namaKaryawan" name="namaKaryawan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>ALAMAT</label>
                <textarea id="alamat" name="alamat" rows="6" cols="30" maxlength="100" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
                <label>JABATAN</label>
                <select id="jabatan" name="jabatan" class="form-control">
                    <?php foreach ($dataJabatan as $a) : ?>
                        <option><?= $a['nama_jabatan'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <a href="<?= base_url('karywan') ?>" class="btn btn-danger">BATAL</a>
            <button class="btn btn-primary" id="tambah" name="tambah">
                TAMBAH
            </button>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->