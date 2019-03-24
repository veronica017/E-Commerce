<?php
$conn=mysqli_connect('sophia.cs.hku.hk','yjliu','701106lj') or die('Error! '. mysqli_error($conn));
mysqli_select_db($conn,'yjliu') or die ('Error'.mysqli_error($conn));
$query='select DISTINCT itemCategory from catalog';
$result = mysqli_query($conn, $query) or die('Error! '. mysql_error($conn));
$json_array = array();
while($row = mysqli_fetch_assoc($result)) {
      //  print "<div id=".$row['itemID'].">";
      //  print "<span>".$row['itemName']."</span><h3>".$row['IteamDescription']."(".$row['itemCategory'].")<h3><h5>".$row['itemImage']." ".$row['itemPrice']."</h5>";
      //  print "</div>";
        $json_array[] =$row;
      //  $myJSON = json_encode($row);
    //    echo $myJSON;
	}
  //print_r($json_array);

  $a=json_encode($json_array);
  echo $a;
?>
