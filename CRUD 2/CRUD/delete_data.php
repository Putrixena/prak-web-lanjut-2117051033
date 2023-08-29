<?php 

    require_once('helper.php');
    parse_str(file_get_contents('php://input'), $value);

    $username = $value['username'];

    $query = "DELETE FROM data_user WHERE username='$username' ";
    $sql = mysqli_query($db_connect, $query);

    if($sql){
        echo json_encode(array('message' => 'HAPUS BERHASIL!'));
    }else{
    echo json_encode(array('message' => 'GAGAL HAPUS!'));
    }

?>
