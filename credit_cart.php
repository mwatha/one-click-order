<?php session_start();                                                          
                                                                                
$db = mysql_pconnect("localhost","root","letusout!");                           
mysql_select_db("shoes", $db);                                                  

$user_id = $_SESSION['user_id'];

if ($user_id) {
  $query = "SELECT u.user_id, c.credit FROM users u 
            LEFT JOIN user_credits c USING(user_id) WHERE u.user_id = $user_id;";           
  $results = mysql_query($query,$db);                                             
  $r = mysql_fetch_row($results);
}
?> 

<style>                                                                         
  #credit {                                                                       
    font-size: 10px;                                                            
    width: 100%;                                                               
    margin-bottom: 20px;                                                        
    color: white;
  }                                                                             
                                                                                
</style>                                                                        

<?php 
if($user_id) {
  if($r[1]) { ?>
    <input type="hidden" name="credit" id="user-credit" value="<?php echo $r[1] ?>" />
<?php 
 }
} ?>
                                                                                
<div style="width: 100%; height: 300px; overflow: auto;">                           
<table id="credit">
</table>                                                                        
</div>                                                                          
                                                                                
