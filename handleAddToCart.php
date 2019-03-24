<?php session_start(); ?>
<?php
$id = $_GET['itemID'];
$quantity = $_GET['updateNumber'];
$total=0;
if (!isset($_SESSION['shoppingCart'])){
			$_SESSION['shoppingCart']= array();
		}
if($id==-1){
	foreach ($_SESSION['shoppingCart'] as $key => $value) {
	  unset($_SESSION['shoppingCart'][$key]);
	}
}
elseif (empty($_SESSION['shoppingCart'][$id])){

  $_SESSION['shoppingCart'][$id]=$quantity;
  //echo $_SESSION['shoppingCart'][$id];
}
elseif(!empty($_SESSION['shoppingCart'][$id])){
  $_SESSION['shoppingCart'][$id]+=$quantity;
//  $_SESSION['shoppingCart'][$id]=0;
}

foreach ($_SESSION['shoppingCart'] as $key => $value) {
  if($value==0)
  {
     unset($_SESSION['shoppingCart'][$key]);
  }
  //unset($_SESSION['shoppingCart'][$key]);
}
foreach ($_SESSION['shoppingCart'] as $key => $value) {
  $total+=$value;
}
//echo $quantity;
//print_r($_SESSION['shoppingCart']);
echo $total;
?>
