<?php session_start();

$db = mysql_pconnect("localhost","root","letusout!");                        
mysql_select_db("shoes", $db);      
 
$fname = $_POST["fname"];                                                       
$lname = $_POST["lname"];                                                       
$dob = $_POST["birthdate"]; 
$sex = $_POST["gender"]; 
$username = $_POST["username"];                                                   
$email = $_POST["email"];                                                   
$address = $_POST["mailing_address"];                                                   
$phone = $_POST["phone_number"];                                                   
$password = md5($_POST["password"]);                                                   

$hour =  date("G") - 1;                                                         
if ($hour < 9) {                                                                
  $hour = "0".$hour;                                                            
}                                                                               
                                                                                
$time =  $hour.date(":i:s");                                                    
$datetime = date("Y-m-d ").$time;

$query = "INSERT INTO users VALUES(NULL,'$username','$password','$datetime');";                                     
mysql_query($query,$db); 


$query = "SELECT user_id FROM users WHERE username = '$username'
          ORDER BY user_id DESC LIMIT 1";
$results = mysql_query($query,$db); 
$r = mysql_fetch_row($results);
 
 
$query = "INSERT INTO person VALUES(NULL,'$fname','$lname','$sex','$dob',
          '$address','$phone','$email','$datetime',$r[0]);";                                     
mysql_query($query,$db); 

$query = "INSERT INTO roles VALUES($r[0],'customer');";                                     
mysql_query($query,$db); 

$_SESSION['username'] = $username;                                            
$_SESSION['user_id'] = $r[0]; 
$_SESSION['role'] = 'customer'; 

?>

<script>
  location.href="index.php";
</script>
