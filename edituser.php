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
        <h1>Edit user details</h1>
           
        <div class="psections">
          



            <?php
$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM person u
          INNER JOIN user_credits c ON c.user_id=u.user_id  
          WHERE u.user_id=$user_id";

$results = mysql_query($query,$db); 
$r = mysql_fetch_row($results);
?>
                                                                             
                                                                             
                                                                             
<form action="edit.php" method="post">

        <table style="padding-bottom: 20px;"><br />
          <tr>
            <td>First name</td>
            <td><input type="text" name="fname" value="<?php echo $r[1] ?>" /></td>
          </tr>
          <tr>
            <td>Last name</td>
            <td><input type="text" name="lname" value="<?php echo $r[2] ?>" /></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>
              <select name="gender">
                <option value="<?php echo $r[3] ?>"><?php echo $r[3] ?></option>
                <option value="Famale">Famale</option>
                <option value="Male">Male</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Birthdate</td>
            <td><input type="text" name="birthdate" value="<?php echo $r[4] ?>" /></td>
          </tr>
          <!--tr>
            <td>username</td>
            <td><input type="text" name="username" /></td>
          </tr -->
          <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $r[7] ?>" /></td>
          </tr>
          <tr>
            <td>Phone number</td>
            <td><input type="text" name="phone_number" value="<?php echo $r[6] ?>" /></td>
          </tr>
          <tr>
            <td>Mailing address</td>
            <td>
              <textarea name="mailing_address"><?php echo $r[5] ?></textarea>
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
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td>Credit</td>
            <td><input type="text" name="credit" size="10" value="<?php echo $r[12] ?>" /></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <input style="width:100%" type="submit" value="Save" />
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
