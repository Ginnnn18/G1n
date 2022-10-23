<?php 
include 'konek.php';
require_once "konek.php";

if(isset($_POST['nama_produk'])&& isset($_POST['tipe_produk'])&& isset($_POST['harga'])&& isset($_POST['stock'])){

    $nama_barang =$_POST['nama_produk'];
    $tipe_barang =$_POST['tipe_produk'];
    $harga_barang =$_POST['harga'];
    $stock_barang =$_POST['stock'];

    $sql = $connect->prepare("INSERT INTO barang (nama_produk,tipe_produk,harga,stock) VALUES(?,?,?,?)");
    //ssdd (adalah S=string D=decimal merupakan data yang nantinya akan di inputkan) dan metode bind_param adalah untuk menyimpan variable yang akan di eksekusi 
    $sql->bind_param('ssdd',$nama_barang,$tipe_barang,$harga_barang,$stock_barang);
    $sql->execute();

    if($sql){
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
    }else{
       echo "gagal";
    }
}
?>