<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>


<p class="fw-bold">WEB LANJUT PRAKTIKUM</p>
<a href="<?=base_url('/user/create')?>" class="btn btn-outline-success">Tambah Data</a>
<div style="width: 50%;">
<table class="table table-success table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
         
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?= $user ['id'] ?></td>
                <td><?= $user ['nama'] ?></td>
                <td><?= $user ['npm'] ?></td>
                <td><?= $user ['nama_kelas'] ?></td>
                <td> <a href="<?= base_url('user/' . $user['id']) ?>" class="btn btn-outline-success">Detail</a> <a href="<?= base_url('user/' . $user['id']. '/edit') ?>" class="btn btn-outline-success">Edit</a>
                <form action="<?= base_url('user/' . $user['id'])?>" method="post" style="display:inline-block ;">
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