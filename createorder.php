<?php session_start(); 

$db = mysql_pconnect("localhost","root","letusout!");                           
mysql_select_db("shoes", $db);

$user_id = $_SESSION['user_id'];
$product_ids = explode(",", $_SESSION["cart"]);                 
$product_quantities =  $_SESSION["quantity"];                   
for($i=0; $i < count($product_ids); $i++) {
  $shoe_id = $product_ids[$i];                                

  $query = "SELECT * FROM shoes WHERE shoe_id = $shoe_id;";
  $results = mysql_query($query,$db);                           
  $r = mysql_fetch_row($results);

  $set_quantity = ($r[5] - $product_quantities[$product_ids[$i]]);

  $query = "UPDATE shoes SET quantity = $set_quantity WHERE shoe_id = $shoe_id;";
  $results = mysql_query($query,$db); 

  $product_cost = ($r[3] *  $product_quantities[$product_ids[$i]]);

  $query = "SELECT * FROM user_credits WHERE user_id = $user_id;";
  $results = mysql_query($query,$db);                           
  $r = mysql_fetch_row($results);

  $set_credit = ($r[2] - $product_cost); 
  $query = "UPDATE user_credits SET credit = $set_credit WHERE user_id = $user_id;";
  $results = mysql_query($query,$db); 
}


$_SESSION["cart"] = null;                                              
$_SESSION["quantity"] = null;
?>

<script>                                                                        
  document.write("Processing your order, Please wait...");                 
  setTimeout("redirect();",3000);                                               
  document.location = "index.php";                                    
</script>
