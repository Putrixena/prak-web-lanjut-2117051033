<?php 

    require_once('helper.php');
    parse_str(file_get_contents('php://input'), $value);

    $id = $value['id'];
    $nama_pengguna = $value['nama_pengguna'];
    $alamat_pengguna = $value['alamat_pengguna'];
    $nama_burger = $value['nama_burger'];
    $rasa_varian = $value['rasa_varian'];

    $query = "UPDATE wakuwaku_burger SET id='$id', nama_pengguna=$nama_pengguna WHERE kata_sandi='$pass'";
    $sql = mysqli_query($db_connect, $query);

    if($sql){
        echo json_encode(array('message' => 'Update!'));
    } else {
        echo json_encode(array('message' => 'GAGAL UPDATE!'));
    }
?>