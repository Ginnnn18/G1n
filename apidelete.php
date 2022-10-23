<?php 
include 'konek.php';

$data = json_decode(file_get_contents("php://input"));

if($data->id!=null){
    $id=$data->id;
    $sql = $connect->prepare("DELETE FROM barang WHERE id=?");
    $sql->bind_param('i',$id);
    $sql->execute();
    if($sql){
        echo json_encode(array('RESPONSE'=>'SUCCESS'));
    }else{
        echo json_encode(array('RESPONSE'=>'SUCCESS'));
    }
}else{
    echo "gagal";
}
?>