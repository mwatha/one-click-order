<?php session_start(); 

$db = mysql_pconnect("localhost","root","letusout!");                        
mysql_select_db("shoes", $db);      
                                                                                
$username = mysql_real_escape_string($_POST["username"]);                                                       
$password = md5($_POST["password"]);                                                       

$user = "SELECT u.user_id,username,role FROM users u 
INNER JOIN roles USING(user_id)
WHERE username='$username' AND password='$password' 
AND role != 'voided' LIMIT 1";      
$results = mysql_query($user,$db);                                 
$n = mysql_num_rows($results);                                         
$r = mysql_fetch_row($results);
?>                                                                                 
<script>
<?php
if($n > 0) { 
  $_SESSION['username'] = $username;
  $_SESSION['user_id'] = $r[0]; 
  $_SESSION["role"] = $r[2];
?>
  location.href = "index.php";
<?php
}else{ ?>
  document.write("Wrong username or password, Please wait...");
  setTimeout("redirect();",4000);
  function redirect() { history.go(-1); }
<?php
} ?>
</script>
