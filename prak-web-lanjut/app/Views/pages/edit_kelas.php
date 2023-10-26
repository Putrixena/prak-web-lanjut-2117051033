<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<h2>INI HALAMAN EDIT KELAS</h2><br>
<div class="d-inline-flex p-2">
<form action="<?= base_url('/kelas/' . $kelas['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?> 
    <input type="hidden" name="_method" value="PUT">
    <label for="nama_kelas" class="form-label">Nama Kelas :</label>
    <input type="text" name="nama_kelas" class="form-control <?= (empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>" value="<?= $kelas['nama_kelas'] ?>" id="nama_kelas">
    <div class='invalid-feedback'><?= validation_show_error('nama_kelas'); ?></div><br>
    <input type="submit" value="Kirim">
</form>
</div>
<?= $this->endSection() ?>
