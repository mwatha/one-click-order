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
        <h1>Kids ....</h1>
           
        <div class="psections">
          



        <table class="zebra-striped">                                           
          <tbody>                                                               
          <?php                                                    

          $query = "SELECT * FROM shoes WHERE shoe_type_id 
            IN(SELECT shoe_type_id FROM shoe_types WHERE name IN('Boys','Girls','Babies'));";                                 
          $results = mysql_query($query,$db);                                   
          $n = mysql_num_rows($results); 
           
          if($n > 0) {                                                  
            for($i=0; $i < $n; $i++){                                         
              $r = mysql_fetch_row($results); ?>

          <tr class="artist_row">                                               
            <td class="image_container">                                        
              <img src="<?php echo $r[6]; ?>" class="images">                
            </td>                                                               
            <td class="item_description">                                       
               <font style="font-size:15px;">Name:&nbsp;
                <font style="color:purple;"><?php echo substr($r[2],0,20); ?></font><br />
                <font style="color:purple;"><?php echo substr($r[2],21,30); ?></font><p />
                <font style="font-size:20px;">Size:&nbsp;
                  <font style="color:red;">
                    <?php echo substr($r[4],0,20); ?><p />
                    <?php echo substr($r[4],21,30); ?>
                  </font>
                </font>
               </font>
            </td>                                                               
            <td class="details">                                                
              <?php 
                $quantity = $r[5];
                if($quantity < 1) {
                  $status = "OUT OF STOCK";    
                }else{
                  $status = "AVAILABLE";    
                }     
              ?>                                                                
              <p style="color:Purple;font-size:15px;"><?php echo $status; ?></p>           
              <p style="color:orange;font-size:20px;">₤<?php echo $r[3]; ?></p>
              <p>

               <select name="quantity" id="quantity<?php echo $r[0]; ?>">                                    
                <option value=""></option>                                      
                <?php for($x=1; $x <= $quantity; $x++){ ?>
                  <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php                                                            
                } ?>                                                                
              </select>

              </p>
              <?php if($_SESSION['username']) { ?>
              <a class="btn" href="javascript:add(<?php echo $r[0]; ?>);">Add to cart</a>
              <?php } ?>
            </td>                                                               
          </tr>                                                                 
          <tr>                                                                  
            <td colspan="3" class="artist_break"><hr /></td>                    
          </tr>                                                                 
          <?php 
            }
          } ?>                                                               
          </tbody>                                                              
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
