<?php session_start();

$db = mysql_pconnect("localhost","root","letusout!");                            
mysql_select_db("shoes", $db);

$product_id = $_GET["product_id"];
$quantity = $_GET["quantity"];

if($_SESSION["cart"] == null) {
  $_SESSION["cart"] = $product_id;
  $_SESSION["quantity"] = array();
  $_SESSION["quantity"][$product_id] = $quantity;
}else{
  $_SESSION["cart"] = $_SESSION["cart"].','.$product_id;
  $_SESSION["quantity"][$product_id] = $quantity;
}

/*------------------------- */
$products =  '';                                                                
$str = explode(",", $_SESSION["cart"]);                                         
                                                                                
for($i=0;$i < count($str);$i++){                                                
  if($products == '' and $str[$i] !='undefined') {                              
    $products = $str[$i];                                                       
  }else if($products != '' and $str[$i] !='undefined'){                         
    $products = $products.','.$str[$i];                                         
  }                                                                             
}                                                                               
                                                                                
$product_ids =  '';                                                             
$str = explode(",", $products);                                                 
                                                                                
for($i=0;$i < count($str);$i++){                                                
  if($product_ids == '' and $str[$i] !='') {                                    
    $product_ids = $str[$i];                                                    
  }else if($product_ids != '' and $str[$i] !=''){                               
    $product_ids = $product_ids.','.$str[$i];                                   
  }                                                                             
}
/* ------------------------- */

$product_ids = mysql_real_escape_string($product_ids);
$query = "SELECT shoe_id, name, price, quantity FROM shoes WHERE shoe_id IN($product_ids)";

$results = mysql_query($query,$db);                                       
$n = mysql_num_rows($results);

$li = '';

if($n > 0) {

for($i=0;$i < $n;$i++) {
  $r = mysql_fetch_row($results);
  if($li == '') { 
    $li = $r[1].":".$r[2].":".($_SESSION["quantity"][$r[0]]);
    $_SESSION["cart"] = $r[0];
  }else{
    $li = $li.",".$r[1].":".$r[2].":".($_SESSION["quantity"][$r[0]]);
    $_SESSION["cart"] = $_SESSION['cart'].",".$r[0];
  }
}

}

/*------------------------- */
/*-------------------------*/


echo $li;
exit;
?>
