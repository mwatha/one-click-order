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
        <h1>Add shoe(s) ....</h1>
           
        <div class="psections">
          


	      <?php
          $query = "SELECT * FROM shoe_types;";

          $results = mysql_query($query,$db); 
          $n = mysql_num_rows($results); ?>


         <table style="width:99%;border-style:solid;border-width:1px;">
          <form id="tasks" action="uploadshoes.php" method="post" enctype="multipart/form-data">

            <tr>                                                            
            <td>Class</td>                                                  
            <td>
              <select name="type" id="type">       
                <option value=""></option>
            <?php if($n > 0) {                                                                    
              for($i=0; $i < $n; $i++){                                                     
                $r = mysql_fetch_row($results); ?>                                            
                <option value="<?php echo $r[0]; ?>"><?php echo $r[1]; ?></option>
            <?php  }                                                                             
            } ?>                                                                              
              </select> 
            </td>            
            </tr>                                                           
                                                                                        

            <tr>                                                            
            <td>Shoe picture</td>                                          
            <td><input type='file' name='uploadedfile' id='file' /></td>    
            </tr>
 
            <tr>                                                           
              <td>Name</td>
              <td><input type='text' name='name' /></td>
            </tr>                                                         
                                                                                        
            <tr>                                                           
            <td>Available shoe size(s)</td>                                                  
            <td><input type='text' name='size' /></td>                     
            </tr>                                                           
                                                                                        
            <tr>                                                            
            <td>Price</td>                                                  
            <td><input type='text' name='price' size='5' /></td>            
            </tr>                                                           
                                                                                        
            <tr>                                                            
            <td>Quantity</td>                                                  
            <td><input type='text' name='quantity' size='5' /></td>            
            </tr>                                                           
                                                                                        
            <tr>                                                            
            <td colspan='2'>&nbsp;</td>                                     
            </tr>                                                           
                                                                                        
            <tr>                                                            
            <td colspan='2'><input type="submit" style='width:100%;' value='Upload' /></td>
            </tr>
          </form>
        </table>
       


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
