<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<h2>INI HALAMAN CREATE KELAS</h2><br>
<div class="d-inline-flex p-2">
<form action="<?= base_url('/kelas/store') ?>" method="post" enctype="multipart/form-data">
    <label for="nama_kelas" class="form-label">Nama Kelas :</label>
    <input type="text" name="nama_kelas" class="form-control <?= (empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>" value='<?= old('nama_kelas');?>'>
    <div class='invalid-feedback'><?= validation_show_error('nama_kelas'); ?></div><br><br>
    <input type="submit" value="Kirim">
</form>
</div>
<?= $this->endSection() ?>
