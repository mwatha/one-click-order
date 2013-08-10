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
        <h1>Customer registration ....</h1>
           
        <div class="psections">
          


	   <form action="createuser.php" method="post" style="width:399px;">
        <table style="padding-bottom: 20px;"><br />
          <tr>
            <td>First name</td>
            <td><input type="text" name="fname" /></td>
          </tr>
          <tr>
            <td>Last name</td>
            <td><input type="text" name="lname" /></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>
              <select name="gender">
                <option value=""></option>
                <option value="Famale">Famale</option>
                <option value="Male">Male</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Birthdate</td>
            <td><input type="text" name="birthdate" /></td>
          </tr>
          <tr>
            <td>username</td>
            <td><input type="text" name="username" /></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="text" name="email" /></td>
          </tr>
          <tr>
            <td>Phone number</td>
            <td><input type="text" name="phone_number" /></td>
          </tr>
          <tr>
            <td>Mailing address</td>
            <td>
              <textarea name="mailing_address"></textarea>
            </td>
          </tr>
          <tr>
            <td>Passowrd</td>
            <td><input type="password" name="password" /></td>
          </tr>
          <tr>
            <td>Re-enter password</td>
            <td><input type="password" name="password2" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align:right;" colspan="2">
              <input type="button" onclick="javascript:document:location='login.php';" value="Cancel" />
              <!--&nbsp;<input type="submit" value="Submit" id="submit" disabled="disabled"  /> -->
              &nbsp;<input type="submit" value="Submit" id="submit"  />
            </td>
          </tr>
		  
        </table>

      </form>
       


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
