<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title><?= $title ?></title>
</head>
<body style="background-color:bisque ;">
<nav class="navbar navbar-expand-lg" style="background-color:#E8CE4D ;">
  <div class="container-fluid" >
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="btn btn-outline-success" href="<?= base_url('user')?>">User</a>
        <a class="btn btn-outline-success" href="<?= base_url('kelas')?>" style="margin-left:20px ;">Kelas</a>
      </div>
    </div>
  </div>
</nav>
    <?= $this->renderSection ('content') ?>
</body>
</html>