<?php
// include database connection file
include "koneksi.php";

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $putri=$_POST['putri'];
    $harga_barang=$_POST['harga_barang'];
    $stok_barang=$_POST['stok_barang'];

    // update user data
    $result = mysqli_query($konek, "UPDATE barang SET putri='$putri',harga_barang='$harga_barang',stok_barang='$stok_barang' WHERE id_barang=$id");

    // Redirect to homepage to display updated user in list
    header("Location: putri.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($konek, "SELECT * FROM barang WHERE id_barang=$id");

while($r = mysqli_fetch_array($result))
{
    $nama = $r['putri'];
    $harga_barang = $r['harga_barang'];
    $stok_barang = $r['stok_barang'];
}
?>


<html>
<head>
 <title>SEMBAKO</title>
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
 <center><h2>SEMBAKO</h2></center>
 <hr />
 <b>Edit Data Barang</b>
    <br/><br/>
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" size="50" name="putri" value="<?php echo $putri;?>"></td>
            </tr>
            <tr> 
                <td>Harga Barang</td>
                <td><input type="text" size="50" name="harga_barang" value="<?php echo $harga_barang;?>"></td>
            </tr>
            <tr> 
                <td>Stok Barang</td>
                <td><input type="text" size="50" name="stok_barang" value="<?php echo $stok_barang;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>