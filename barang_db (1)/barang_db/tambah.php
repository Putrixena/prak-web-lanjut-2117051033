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
     </style>
</head>
<body style="font-family:arial">
 <center><h2>WAROENG KITA</h2></center>
 <hr />
 <b>Tambah Data Baru</b>
    <br/><br/>

    <form action="tambah.php" method="post" name="form1">
        <table width="100%" border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="putri" size="50" required></td>
            </tr>
            <tr> 
                <td>Harga Barang</td>
                <td><input type="text" name="harga_barang" size="50" required></td>
            </tr>
            <tr> 
                <td>Stok Barang</td>
                <td><input type="text" name="stok_barang" size="50" required></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="+ Tambahkan"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $putri = $_POST['putri'];
        $harga_barang = $_POST['harga_barang'];
        $stok_barang = $_POST['stok_barang'];

        include "koneksi.php";

  $tambah_barang = "insert into barang values('','$putri','$harga_barang','$stok_barang')";
     $kerjakan=mysqli_query($konek, $tambah_barang);
     if($kerjakan)
     {
     
     echo "Barang berhasil ditambahkan. <a href='putri.php'>Lihat Data Barang</a>";
     }
     else
      {
      echo "Gagal";
     }
    }
    ?>
</body>
</html>