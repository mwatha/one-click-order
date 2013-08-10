<?php session_start();                                                          
                                                                                
$db = mysql_pconnect("localhost","root","letusout!");                            
mysql_select_db("shoes", $db); 

$name = mysql_real_escape_string($_POST["name"]);
$shoe_type_id = mysql_real_escape_string($_POST["type"]);
$sizes = mysql_real_escape_string($_POST["size"]);
$price = mysql_real_escape_string($_POST["price"]);
$quantity = mysql_real_escape_string($_POST["quantity"]);

$filename = $_FILES['uploadedfile']['name']; // Get the name of the file (including file extension).
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.

$query = "SELECT shoe_id FROM shoes ORDER BY shoe_id DESC LIMIT 1";
$results = mysql_query($query,$db);                                         
$r = mysql_fetch_row($results);                                                 
$n = mysql_num_rows($results);                                                  
                                                                                
if ($n > 0) {                                                                   
  $url = 'images/shoes/'.$r[0].rand(1000, 1000000).$ext;                             
}else{                                                                          
  $url = 'images/shoes/'.rand(1000, 1000000).$ext;                                   
}                                                                               
                                                                                
                                                                                
$query = "INSERT INTO shoes VALUES(NULL,$shoe_type_id,'$name','$price','$sizes',$quantity,'$url',NULL)";
mysql_query($query,$db);                                         

move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $url)
?>

<script>
  document.write("Uploaded successful, Please wait...");
  setTimeout("redirect();",2000);
  function redirect() { location.href = "addshoes.php"; }
</script>
