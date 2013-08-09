<?php session_start();                                                          
                                                                                
$db = mysql_pconnect("localhost","root","");                                    
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
            <?php if($_SESSION["role"] == 'admin') { ?>                            
              <li><a href="admin.php" class="last">admin</a></li>               
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
        <h1>Blank ....</h1>
           
        <div class="psections">
          



        <table class="zebra-striped">                                           
          <tbody>                                                               
          <?php
          $values = array(1,2,3);
          for($i=0;$i < count($values);$i++){
            $brand = 'aa';
            $sizes = "4,5,6,10";
          ?>               
          <tr class="artist_row">                                               
            <td class="image_container">                                        
              <img src="images/shoes/<?php echo "images.jpeg"; ?>" class="images">                
            </td>                                                               
            <td class="item_description">                                       
               <font style="font-size:15px;">Brand:&nbsp;
                <font style="color:purple;"><?php echo substr($brand,0,14); ?></font><br />
                <font style="color:purple;"><?php echo substr($brand,15,29); ?></font><p />
                <font style="font-size:20px;">Size:&nbsp;
                  <font style="color:red;">
                    <?php echo substr($sizes,0,8); ?><p />
                    <?php echo substr($sizes,9,15); ?>
                  </font>
                </font>
               </font>
            </td>                                                               
            <td class="details">                                                
              <?php 
                $quantity = 0;
                $price = 12.99;
                $status = "OUT OF STOCK";         
              ?>                                                                
              <p style="color:Purple;font-size:15px;"><?php echo $status; ?></p>           
              <p style="color:orange;font-size:20px;"><?php echo $price; ?></p>
              <p><a class="btn" href="/products/view/<?php echo '1'; ?>">View more</a></p>
            </td>                                                               
          </tr>                                                                 
          <tr>                                                                  
            <td colspan="3" class="artist_break"><hr /></td>                    
          </tr>                                                                 
          <?php } ?>                                                               
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
                    	<li><a href="#">Quisque in ligula</a></li>
                        <li><a href="#">Donec a massa dui</a></li>
                        <li><a href="#">Aenean facilisis</a></li>
                        <li><a href="#">Etiam vitae consequat</a></li>
                        <li><a href="#">Lorem ipsum dolor</a></li>
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
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Phasellus eget lorem</a></li>
                        <li><a href="#">Sed sit amet sem</a></li>
                        <li><a href="#">Cras eget est vel</a></li>
                        <li><a href="#">Quisque in ligula</a></li>
                    </ul>
                    
                </div>
                
                <div class="bottom"></div>
            </div>
            
            
        </div> <!-- end of sidebar -->
    
    	<div class="cleaner"></div>
    </div> <!-- end of main-->

	<div id="templatemo_footer">
  Copyright © 2048 <a href="#">Your Company Name</a> | 
  <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
  </div> <!-- end of templatemo_footer -->
    
</div> <!-- end of wrapper -->
</body>
</html>
