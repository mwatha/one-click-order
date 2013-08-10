<?php session_start();                                                          
                                                                                
$db = mysql_pconnect("localhost","root","letusout!");                           
mysql_select_db("shoes", $db);                                                  

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user_credits WHERE user_id = $user_id;";           
$results = mysql_query($query,$db);                                   
$n = mysql_num_rows($results);                                        
?> 

<style>                                                                         
  #credit {                                                                       
    font-size: 10px;                                                            
    width: 100%;                                                               
    margin-bottom: 20px;                                                        
    color: white;
  }                                                                             
                                                                                
</style>                                                                        

<?php if($n > 0) {  
$r = mysql_fetch_row($results) ?>
<input type="hidden" name="credit" id="user-credit" value="<?php echo $r[2] ?>" />
<?php } ?>
                                                                                
<div style="width: 100%; height: 300px; overflow: auto;">                           
<table id="credit">
</table>                                                                        
</div>                                                                          
                                                                                
