<?php

if($_GET['action']=="load"){
		load($_GET['record'],$_GET['type']);
	}
	if($_GET['action']=="total"){
			total($_GET['type']);
		}

function load($record,$type){
  $conn=mysqli_connect('sophia.cs.hku.hk','yjliu','701106lj') or die('Error! '. mysqli_error($conn));
  mysqli_select_db($conn,'yjliu') or die ('Error'.mysqli_error($conn));
/*  $count_query='SELECT COUNT(*) FROM catalog';
		$total = mysqli_query($conn, $count_query) or die ('Failed to query '.mysqli_error($conn));
		if($record>=$total){
			$record=$total-3;
		}*/
    if($type==1)
    {
      	$query = 'select * from catalog WHERE itemCategory="Books"  ORDER BY itemName limit '.$record.', 3';
    }
    if($type==2)
    {
        $query = 'select * from catalog WHERE itemCategory="Albums"  ORDER BY itemName limit '.$record.', 3';
    }
    if($type==3)
    {
        $query = 'select * from catalog WHERE itemCategory="DVD"  ORDER BY itemName limit '.$record.', 3';
    }
    /*else if($type==2)
    {
      	$query = 'select * from catalog WHERE itemCategory="Albums"  ORDER BY itemName limit '.$record.', 3';
    }
    else if($type==3)
    {
      	$query = 'select * from catalog WHERE itemCategory="DVD"  ORDER BY itemName limit '.$record.', 3';
    }*/

		$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));

    $json_array = array();
    while($row = mysqli_fetch_assoc($result)) {
          //  print "<div id=".$row['itemID'].">";
          //  print "<span>".$row['itemName']."</span><h3>".$row['IteamDescription']."(".$row['itemCategory'].")<h3><h5>".$row['itemImage']." ".$row['itemPrice']."</h5>";
          //  print "</div>";
            $json_array[] =$row;
          }
          $a=json_encode($json_array);
          echo $a;
}

function total($type){
	$conn=mysqli_connect('sophia.cs.hku.hk','yjliu','701106lj') or die('Error! '. mysqli_error($conn));
	mysqli_select_db($conn,'yjliu') or die ('Error'.mysqli_error($conn));
	if($type==1)
	{
			$query = 'SELECT COUNT(*) FROM catalog WHERE itemCategory="Books"';
	}
	if($type==2)
	{
				$query = 'SELECT COUNT(*) FROM catalog WHERE itemCategory="Albums"';
	}
	if($type==3)
	{
			$query = 'SELECT COUNT(*) FROM catalog WHERE itemCategory="DVD"';
	}
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));

	$json_array = array();
	while($row = mysqli_fetch_assoc($result)) {
				//  print "<div id=".$row['itemID'].">";
				//  print "<span>".$row['itemName']."</span><h3>".$row['IteamDescription']."(".$row['itemCategory'].")<h3><h5>".$row['itemImage']." ".$row['itemPrice']."</h5>";
				//  print "</div>";
					$json_array[] =$row;
				}
				$a=json_encode($json_array);
				echo $a;
}



/*
if($_GET['action']=="begin"){
		$query='select * from catalog ORDER BY itemName';
}
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
  echo $a;*/
/*
  $ar = array('apple', 'orange', 'banana', 'strawberry');
  echo json_encode($ar);
  //echo json_encode($json_array);


  s=[];
  for(i=0;i<json.length;i++){
    s.push(json[i]["itemName"]);
  }
  s.sort();

foreach ($json_array as $w3r_string) {
json_decode($w3r_string);
 switch (json_last_error()) {
case JSON_ERROR_NONE:
 echo ' - No errors';
 break;
 case JSON_ERROR_DEPTH:
 echo ' - Maximum stack depth exceeded';
 break;
 case JSON_ERROR_STATE_MISMATCH:
 echo ' - Underflow or the modes mismatch';
 break;
 case JSON_ERROR_CTRL_CHAR:
 echo ' - Unexpected control character found';
 break;
 case JSON_ERROR_SYNTAX:
 echo ' - Syntax error, malformed JSON';
 break;
 case JSON_ERROR_UTF8:
 echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
 break;
 default:
 echo ' - Unknown error';
 break;
 }
 echo PHP_EOL;
 }
 */
?>
