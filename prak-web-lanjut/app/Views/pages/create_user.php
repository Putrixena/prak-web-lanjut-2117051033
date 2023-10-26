    <?= $this->extend('layouts/app') ?>

    <?= $this->section('content') ?>
    <h2>INI HALAMAN CREATE USER</h2><br>
    <div class="d-inline-flex p-2">
    <form action="<?= base_url('/user/store') ?>" method="post" enctype="multipart/form-data">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" name="nama" class="form-control <?= (empty(validation_show_error('nama'))) ? '' : 'is-invalid' ?>" value='<?= old('nama');?>'>
        <div class='invalid-feedback'><?= validation_show_error('nama'); ?></div><br><br>

        <label for="npm" class="form-label">NPM:</label>
        <input type="text" id="npm" name="npm" class="form-control <?= (empty(validation_show_error('npm'))) ? '' : 'is-invalid' ?>">
        <div class='invalid-feedback'><?= validation_show_error('npm'); ?></div><br><br>


        <label for="kelas" class="form-label">Kelas:</label>
        <select name="kelas" id="" class="form-select <?= (empty(validation_show_error('kelas'))) ? '' : 'is-invalid' ?>">

        <?php foreach($kelas as $item){
                    ?>
                    <option value="<?= $item['id']?>">
                        <?= $item['nama_kelas']?>
                    </option>
                <?php
                }?>
        </select>
        <div class='invalid-feedback'><?= validation_show_error('kelas'); ?></div>
        <input type="file" name="foto" id="">
        <input type="submit" value="Kirim">
    </form>
    </div>
    <?= $this->endSection() ?>
