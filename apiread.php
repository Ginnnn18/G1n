<?php 
include 'konek.php';
$array = array();


if($result= mysqli_query($connect,"SELECT * FROM barang ORDER BY id ASC")){
while($row = $result->fetch_array(MYSQLI_ASSOC)){
   $array []= $row;
}

mysqli_close($connect);
echo json_encode($array);
}
?>