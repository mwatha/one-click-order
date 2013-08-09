<?php session_start();

$db = mysql_pconnect("localhost","root","letusout!");                        
mysql_select_db("shoes", $db);      
 
$user_id = $_POST['user_id'];
 
$query = "UPDATE roles SET role='voided' WHERE user_id=$user_id;";                                     
mysql_query($query,$db);

?>



<script>
  document.write("Removing user, Please wait...");
  setTimeout("redirect();",2000);
  function redirect() { location.href = "voidcustomers.php"; }
</script>
