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
            <li><a href="contact.php" class="last">Contact us</a></li>
            <li><a href="login.php" class="last">Login</a></li>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_main">
    
    	<div id="templatemo_content">
        <!-- start of content -->
        <h1>login ....</h1>
           
        <div class="psections">
          


        <form action="authenticate.php" method="post">                                  
          <table id="stats" width="200" style="background-color:lightgrey;">              
            <tr>                                                                          
              <td><input type="text" name="username" value="Username" onblur="if (value == '') {
                value = 'Username'                                                              
              }" onfocus="if (value == 'Username') {value =''}" /></td>                   
            </tr>                                                                         
            <tr>                                                                          
              <td><input type="password" name="password" value="Password" onblur="if (value == '') {
                value = 'Password'                                                              
              }" onfocus="if (value == 'Password') {value =''}" /></td>                   
              </tr>                                                                         
            <tr>                                                                          
              <td style="text-align:right;"><label><a href="registration.php">register now</a></label>
              <input type="submit" name="submit" class="button" value="Login" /></td>       
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
