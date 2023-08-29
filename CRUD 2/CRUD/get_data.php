<?php 
    require_once('helper.php');

    $query = "SELECT * FROM wakuwaku_burger";
    $sql = mysqli_query($db_connect, $query);

    if($sql){
        $result = array();
        while($row = mysqli_fetch_array($sql)){
            array_push($result, array(
                'id' => $row['id'],
                'nama_pengguna' => $row['nama_pengguna'],
                'alamat_pengguna' => $row['alamat_pengguna'],
                'nama_burger' => $row['nama_burger'],
                'rasa_varian' => $row['rasa_varian'],
            ));
        }
        echo json_encode(array($result));
    }
?>