<?php session_start();                                                          
                                                                                
$db = mysql_pconnect("localhost","root","letusout!");                                    
mysql_select_db("shoes", $db);                                                  
                                                                                
?>                                                                              
                                                                                
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shoes</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/psections.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_wrapper">
	
    <!--div id="templatemo_header">
            <h3>Exercise <br /><span>for your</span><br /> HEALTH</h3>
        </div>
    
    </div--> <!-- end of header -->
    
    <div id="templatemo_menu">
    
        <ul>
            <li><a href="index.php" class="current">Home</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <?php if($_SESSION["role"]) { ?>                                
              <li><a href="admin.php" class="last">Settings</a></li>
            <?php } ?>
            <?php if($_SESSION['username']) { ?>                                
              <li><a href="logout.php" class="last">Logout</a>&nbsp;welcome:&nbsp;<?php echo $_SESSION['username']; ?></li>
            <?php }else{ ?>                                                     
              <li><a href="login.php" class="last">Login</a></li>               
            <?php } ?>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_main">
    
    	<div id="templatemo_content">
        <!-- start of content -->
        <h1>admin ....</h1>
           
        <div class="psections">
          


	      <script>                                                                        
        function task(ts) {                                                           
          var url = null;                                                             
          if(ts == "addshoes") {                                                         
            location.href = "addshoes.php";                                       
          }else if(ts == "voidcustomer"){                                                 
            location.href = "voidcustomers.php";                                       
          }else if(ts == "edituser"){                                                 
            location.href = "edituser.php";                                           
          }                                                                           
        }                                                                             
        </script>                                                                       
                                                                                
<?php                                                                           
                                                                                
$user_id = $_SESSION['user_id'];                                                
                                                                                
$user_role = "SELECT role FROM roles WHERE user_id = $user_id LIMIT 1";         
$results = mysql_query($user_role,$db);                                         
$r = mysql_fetch_row($results);                                                 
?>                                                                              
                                                                                
                                                                                
<div class="links">                                                             
 <ul><?php if ($r[0] == 'admin') { ?>                                           
      <li><a href="#" onclick="javascript:task('addshoes');">Add shoes</a></li>
      <li><a href="#" onclick="javascript:task('voidcustomer');">Remove customer</a></li>
    <?php } ?>
    <li><a href="#" onclick="javascript:task('edituser');">Change user details</a></li>
  </ul>                                                                         
</div>
       


        </div>

        <!-- end of content -->
        </div> 
        
        <div id="templatemo_sidebar">
        	
            <div class="sidebar_box">
            	
                <div class="header">
                	<h5>Shopping cart</h5>
                </div>
                
                <div class="content">
            
                    <ul class="categories_list">
                    	<!--li><a href="#">Quisque in ligula</a></li-->
                      <?php require 'shopping_cart.php'; ?>
                    </ul>
                    
                </div>
                
                <div class="bottom"></div>
            </div>

            <div class="sidebar_box">
            	
                <div class="header">
                	<h5>Available credit</h5>
                </div>
                
                <div class="content">
            
                   <ul class="categories_list">
                     <?php require 'credit_cart.php'; ?>
                   </ul>
                    
                </div>
                
                <div class="bottom"></div>
            </div>
            
            
        </div> <!-- end of sidebar -->
    
    	<div class="cleaner"></div>
    </div> <!-- end of main-->

   <div id="templatemo_footer">                                                  
   Copyright © 2013 <a href="#">Tanian</a> | <a href="https://www.facebook.com/orama2?fref=ts&ref=br_tf" target="_blank">orama chisale</a>
   </div> <!-- end of templatemo_footer -->
        
</div> <!-- end of wrapper -->
</body>
</html>
