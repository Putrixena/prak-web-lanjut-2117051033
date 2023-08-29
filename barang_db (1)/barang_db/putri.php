<html>
<head>
 <title>uas web</title>
 <style>
    body {
        background-image: url("ping.jpg");
        background-position: center;
        background-size: 100% 100%;
        background-attachment: fixed;
     }
     
 .table1 {
    font-family: sans-serif;
    color: black;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}

.table1 tr th{
    background: #35A9DB;
    color: bisque;
    font-weight: normal;
}

.table1, th, td {
    padding: 8px 20px;
    text-align: left;
}

.table1 tr:hover {
    background-color: #35A9DB;
}

.table1 tr:nth-child(even) {
    background-color: palevioletred;
}
 </style>
</head>
<body style="font-family:arial">
 <center><h2>WAROENG KITA</h2></center>
 <hr />
 <a href="tambah.php"> Menambah Data Baru</a><br /><br />
 <b>Data Barang</b>
 <table style="width:100%" class="table1">
  <tr>
   <th>Kode</th>
   <th>Nama</th>
   <th>Harga</th>
   <th>Stok</th>
   <th colspan=2><center>Opsi</center></th>
  </tr>
  
  <?php 
  include "koneksi.php";
  $no = 1;
  $data = mysqli_query($konek,"select * from barang");
  while($r = mysqli_fetch_array($data)){
   $id_barang = $r['id_barang'];
   $putri = $r['putri'];
   $harga_barang = $r['harga_barang'];
   $stok_barang = $r['stok_barang'];
        ?>
  <tr>
   <td><?php echo $id_barang; ?></td>
   <td><?php echo $putri; ?></td>
   <td><?php echo $harga_barang; ?></td>
   <td><?php echo $stok_barang; ?></td>
  <td align=right width=70px><a href="edit.php?id=<?php echo $id_barang;?>"onclick="return confirm('Ingin edit data?')"><button type="button"class="btn btn-danger">Edit</button></a></td>
  <td align=right width=70px><a href="hapus.php?id=<?php echo $id_barang;?>"onclick="return confirm('Ingin menghapus data?')"><button type="button"class="btn btn-danger">Delete</button></a></td>
  </tr>
  <?php 
  }
  ?>
 </table> 
</body>
</html>