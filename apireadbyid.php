<?php 
include 'konek.php';

$array = array();
if(isset($_GET['id'])){
    $id=$_GET['id'];

    if($result = mysqli_query($connect,"SELECT * FROM barang WHERE id=$id")){
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] =$row;
        }
        mysqli_close($connect);
        echo   json_encode($array);
    }
}
?>