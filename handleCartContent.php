<?php session_start(); ?>
<?php

$conn=mysqli_connect('sophia.cs.hku.hk','yjliu','701106lj') or die('Error! '. mysqli_error($conn));
mysqli_select_db($conn,'yjliu') or die ('Error'.mysqli_error($conn));
$json_array = array();
foreach ($_SESSION['shoppingCart'] as $key => $value) {
 $query='SELECT * from catalog WHERE itemID='.$key;//+$key;

 $result = mysqli_query($conn, $query) or die('Error! '. mysql_error($conn));
 //print $result;
  while($row = mysqli_fetch_assoc($result)){
      $json_array[] =$row;
      $json_array[] =$value;
  }

}
//print_r($json_array);
$a=json_encode($json_array);
echo $a;


?>
