<?php 

    require_once('helper.php');

    $id = $_POST['id'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $password = $_POST['kata_sandi'];

    $query = "INSERT INTO data_user(username, phone_number, kata_sandi) VALUES ('$username', $phone_number, '$password');";
    $sql = mysqli_query($db_connect, $query);

    if($sql){
        echo json_encode(array('message' => 'Created!'));
    } else {
        echo json_encode(array('message' => 'GAGAL!'));
    }

?>