<?php 
include 'konek.php';
require_once "konek.php";

$data = json_decode(file_get_contents("php://input"));

if($data->id!=null){
    $id =$data->id;
    $tipe_produk =$data->tipe_produk;
    $nama_produk =$data->nama_produk;
    $harga =$data->harga;
    $stock =$data->stock;

    $sql = $connect->prepare("UPDATE barang SET nama_produk=?, tipe_produk=?, harga=?, stock=? WHERE id=?");
    $sql-> bind_param('ssddd',$nama_produk,$tipe_produk,$harga,$stock,$id);
    $sql->execute();

    if($sql){
        echo json_encode(array('RESPONSE'=>'SUCCESS'));
    }else{
        echo json_encode(array('RESPONSE'=>'FAILED'));
    }
}else{
    echo "gagal";
}

?>