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

<script>    
   function updateRows(element){
     location.href="voidcustomers.php?user_id=" + element.value;
   }                                                              
</script>

<style>

  .data {
    border-style: solid;
    border-width: 1px; /*0px 1px 0px;*/
    padding-left: 10px;
  }

  #stats span {
    vertical-align: top;
  }

  .lightSteelBlue {
    background-color: lightSteelBlue;
  }

  .links ul {
    background-color: LightGray;
    color: Black;
    font-size: 14px;
    padding-left: 10px;
    width: 245px;
  }

</style>


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
        <h1>remove user(s) ....</h1>
           
        <div class="psections">
          



          <table style="padding-bottom: 20px;"><br />
          <tr>
            <td>Select username</td>
            <td>
              <select name="type" id="type" onchange="updateRows(this);">
                <option value=""></option>
                <?php
                $query = "SELECT u.user_id,u.username FROM users u 
                          INNER JOIN roles r ON r.user_id = u.user_id
                          WHERE r.role != 'voided'";
                
                
                $results = mysql_query($query,$db);
                $num = mysql_num_rows($results); 
                for($i=0; $i < $num; $i++){ 
                  $rc = mysql_fetch_row($results); ?>
                  <option value="<?php echo $rc[0]; ?>"><?php echo $rc[1]; ?></option>
                <?php } 
               
                $user_id = $_GET['user_id'];
                if($user_id){ 
                  $query = "SELECT * FROM person WHERE user_id = $user_id";
                  $results = mysql_query($query,$db);
                  $num = mysql_num_rows($results); 
                  $r = mysql_fetch_row($results); 
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>First name</td>
            <td><input type="text" id="fname" disabled="disabled" value="<?php echo $r[1]; ?>" /></td>
          </tr>
          <tr>
            <td>Last name</td>
            <td><input type="text" id="lname" disabled="disabled" value="<?php echo $r[2]; ?>" /></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><input type="text" id="sex" disabled="disabled" value="<?php echo $r[3]; ?>"  /></td>
          </tr>
          <tr>
            <td>Birthdate</td>
            <td><input type="text" id="dob" disabled="disabled" value="<?php echo $r[4]; ?>" /></td>
          </tr>

          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <form action="void.php" method="post">
            <td><input type="submit" value="Remove" /></td>
          </tr>
          <?php if($user_id){ ?>
          <input type="hidden" value="<?php echo $user_id; ?>" name ="user_id" />
          <?php } ?>
        </table></form>






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
