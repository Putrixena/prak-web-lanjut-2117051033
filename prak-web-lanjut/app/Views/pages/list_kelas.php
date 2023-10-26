<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>


<p class="fw-bold">WEB LANJUT PRAKTIKUM</p>
<a href="<?=base_url('/kelas/create')?>" class="btn btn-outline-success">Tambah Data</a>
<div style="width: 50%;">
<table class="table table-success table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($kelas as $k) {
            ?>
            <tr style=";">
                <td><?= $k['id'] ?></td>
                <td><?= $k['nama_kelas'] ?></td>
                <td class=""><a href="<?= base_url('kelas/' . $k['id']. '/edit') ?>" class="btn btn-outline-success">Edit</a>
                <form action="<?= base_url('kelas/' . $k['id'])?>" method="post" style="display: inline-block;">
                   <input type="hidden" name="_method" value="DELETE">
                   <?= csrf_field() ?>
                    <button type="submit" class="btn btn-outline-success">Delete</button></form></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</div>
<?= $this->endSection() ?>