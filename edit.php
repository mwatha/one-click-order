<?php session_start();

$db = mysql_pconnect("localhost","root","letusout!");                        
mysql_select_db("shoes", $db);      

$user_id = $_SESSION["user_id"];
 
$fname = mysql_real_escape_string($_POST["fname"]);                                                       
$lname = mysql_real_escape_string($_POST["lname"]);                                                       
$dob = mysql_real_escape_string($_POST["birthdate"]); 
$sex = mysql_real_escape_string($_POST["gender"]); 
$email = mysql_real_escape_string($_POST["email"]);                                                   
$address = mysql_real_escape_string($_POST["mailing_address"]);                                                   
$phone = mysql_real_escape_string($_POST["phone_number"]);                                                   
$password = md5($_POST["password"]);                                                   
$edited_password = $_POST["password"];                                                   
$credit = mysql_real_escape_string($_POST["credit"]);

$hour =  date("G") - 1;                                                         
if ($hour < 9) {                                                                
  $hour = "0".$hour;                                                            
}                                                                               
                                                                                
$time =  $hour.date(":i:s");                                                    
$datetime = date("Y-m-d ").$time;

if($edited_password != null) {
  $query = "UPDATE users SET password = '$password' WHERE user_id = $user_id;";                                     
  mysql_query($query,$db); 
}

$query = "UPDATE person SET first_name = '$fname',last_name = '$lname',birthdate = '$dob',
          address ='$address',phone_number='$phone',email='$email' 
          WHERE user_id = $user_id;";                                     
mysql_query($query,$db); 


if($credit != null) {
  $query = "SELECT * FROM user_credits WHERE user_id = $user_id;";                
  $results = mysql_query($query,$db);                                       
  $count = mysql_num_rows($results);

  if($count > 0) {
  $query = "UPDATE user_credits SET credit = '$credit' WHERE user_id=$user_id";
  }else{
  $query = "INSERT INTO user_credits VALUES(NULL,$user_id,'$credit');";
  }
  mysql_query($query,$db); 
}

?>

<script>
    document.write("Successful updated details, please wait ...");                                    
    setTimeout("redirect();",2000);                                               
    function redirect() { location.href = "admin.php"; }
</script>
